<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5 col">
        <div class="flex-row">
            <form class="form-group " action="" method="post">
                <h1 class=" text-info text-center m-5">Commercial Line</h1>
                <div id="form-inputs" class="w-300"></div>
                <div class="form-group">
                    <button type="button" id="addNews" class="btn btn-secondary btn-group-lg">+Add New</button>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-group-lg">Submit</button>
                </div>
                <div class="form-group">
                    <button type="button" class=" btn btn-info btn-group-lg mr-0 show " data-quest="" data-toggle="modal" data-target="#exampleModal">Show </button>
                </div>
            </form>
        </div>
        <div class="col-6">
            <div style="display: flex;color: #17a2b8; flex-direction: column;">
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Breaking News</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-info save" data-dismiss="modal">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    let i = 0
    window.addEventListener('load',function () {
        let container = $("#form-inputs");
        let addAnswer = $('#addNews');
        addAnswer.on('click', function () {
            container.append(`<div class="form-group"><input type='text' name=${i++} class='form-control' placeholder='Write Content News'></div>`);
        });
        let news = document.querySelectorAll(".form-control");
        
    });
    jQuery(document).ready(function ($) {
        $(".show").on("click", function (event) {
            $.ajax({
                url: ajaxurl,
                method: 'post',
                data: {
                    'action': 'line_ajax_request',
                },
                success: res => {
                    $('.modal-body').empty().append(res)
                },
                error: err => {
                    console.log("it isn't working");
                }
            })
        });
        $(".modal").on("click", ".save", function (event) {
            let changed_a = [];
            let a_id = [];
            $(".changed-answer").map(function () {
                changed_a.push(this.value);
                a_id.push(this.id);
            });
            $.ajax({
                url: ajaxurl,
                method: 'post',
                data: {
                    'action': 'save_changes_ajax_request',
                    'changed_a': changed_a,
                    'changed_q': changed_q,
                    'a_id': a_id,
                    'q_id': q_id
                },
                success: res => {
                    console.log(res)
                },
                error: err => {
                    console.log("it isn't working");
                }
            })
        })
        // $(".modal").on("click", ".ans-delete", function (event) {
        //     let btn_id = $(".ans-delete").attr("id");
        //     $.ajax({
        //         url: ajaxurl, // Since WP 2.8 ajaxurl is always defined and points to admin-ajax.php
        //         method: 'post',
        //         data: {
        //             'action': 'poll_ajax_delete_answer', // This is our PHP function below
        //             'ans_id': btn_id// This is the variable we are sending via AJAX
        //         },
        //         success: res => {
        //             $("." + btn_id).remove();
        //         },
        //         error: err => {
        //             console.log("it isn't working");
        //         }
        //     })
        // })
    })
</script>

<style>
    h1{
    }
    .form-group{
        display: flex;
        flex-direction: column;
        width: 70%;
        font-weight: bold;
        margin: auto;
    }

</style>

<?php
//insert input
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
$tableName = "wp_commercial_line";
$dbPrefix = DB_NAME;
$sql = "CREATE TABLE `$dbPrefix`.`$tableName` ( `id` INT NOT NULL AUTO_INCREMENT , `content` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
$a = maybe_create_table($tableName, $sql);
$news=[];
function checking($x){
    return $x!=""?true:false;
}
$name=0;
while(checking(isset($_POST["{$name}"]))){
    array_push($news,$_POST["{$name}"]);
    var_dump($_POST["{$name}"]);
    $name++;
}
for($i=0;$i<count($news);$i++){
    $wpdb->insert(
        $tableName,
        array(
            'content'=>$news[$i]
        ),
        array(
            '%s'
        )
    );}

?>
