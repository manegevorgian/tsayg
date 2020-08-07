<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <form method="post" action="">
        <div class="container" id="container" style="display: flex;color: #4cae4c; flex-direction: column; width:30%">
            <h3 class="text-center mt-5" style="color: #4cae4c; font-weight: bolder" >TCO Poll</h3>
            <div id="form-inputs">
                <div class="form-group">
                    <label for="question">Set the Question</label>
                    <input name="question" type="text" id="question" class="form-control" placeholder="Question">
                </div>
                <div class="form-group" id="answer-div">
                    <label for="answer">Answer</label>
                    <input  type="text" id="answer" class="form-control" placeholder="Enter the Answer">
                </div>
            </div>
            <div class="form-group">
                <button type="button" id="addAnswer" class="btn btn-secondary btn-group-lg">+Add new</button>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success btn-group-lg">
            </div>
        </div>
    </form>

<script type='text/javascript'>
    let i = 0
    window.addEventListener('load',function () {
        let container = $("#form-inputs");
        let addAnswer = $('#addAnswer');
        addAnswer.on('click', function () {
            container.append(`<div class="form-group" id="answer-div"><label for="answer">Answer</label><input type='text' name=${i++} class='form-control' placeholder='Enter the Answer'></div>`);
        });
        let answers = document.querySelectorAll(".form-control");
        console.log(answers);
        // for(let i=1;i<=answers.length;i++){
        // $( "#answer" ).attr({
        //    name: i
        // });
        // }
    });

</script>


<style>
    input[type="text"]:focus,
    .uneditable-input:focus {
        border-color: rgba(126, 239, 104, 0.8);
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(126, 239, 104, 0.6);
        outline: 0 none;
    }
</style>

<?php
$answers=[];
function checking($x){
   return $x!=""?true:false;
}
if(checking($_POST['question'])){
    $question=$_POST['question'];
}
$name=0;
while(checking($_POST["{$name}"])){
    array_push($answers,$_POST["{$name}"]);
    $name++;
}
$answers_str=implode("/" ,$answers);
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

$tableName = "wp_tco_poll";
$dbPrefix = DB_NAME;
$sql = "CREATE TABLE `$dbPrefix`.`$tableName` ( `id` INT NOT NULL AUTO_INCREMENT , `question` TEXT NOT NULL , `answers` TEXT NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB";
$a = maybe_create_table($tableName, $sql);


$wpdb->insert(
    $tableName,
    array(
        'question'=>$question,
        'answers'=>$answers_str
    ),
    array(
        '%s',
        '%s'
    )
);