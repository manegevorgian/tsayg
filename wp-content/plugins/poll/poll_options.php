<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css"
      integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    $answers = [];
    $tableName1 = "wp_tco_poll_questions";
    $tableName2 = "wp_tco_poll_answers";
    $dbPrefix = DB_NAME;
    $sql1 = "CREATE TABLE `$dbPrefix`.`$tableName1` ( `id` INT NOT NULL AUTO_INCREMENT , `question` TEXT NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB";
    $sql2 = "CREATE TABLE `$dbPrefix`.`$tableName2` ( `id` INT NOT NULL AUTO_INCREMENT , `question_id` INT NOT NULL , `answer` TEXT NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB";
    
    $a1 = maybe_create_table($tableName1, $sql1);
    $a2 = maybe_create_table($tableName2, $sql2);
    
    function checking($x)
    {
        return $x != "" ? true : false;
    }
    
    if (checking($_POST['question']) && $_POST['question'] != null) {
        $question = $_POST['question'];
        $wpdb->insert(
            $tableName1,
            array(
                'question' => $question
            ),
            array(
                '%s'
            )
        );
    }
    $name = 0;
    while (checking($_POST["{$name}"])) {
        array_push($answers, $_POST["{$name}"]);
        $name++;
    }
    $question_id = $wpdb->get_row("SELECT  `id` FROM `wp_tco_poll_questions` WHERE `question`='$question'");
    for ($a = 0; $a < count($answers); $a++) {
        $wpdb->insert(
            $tableName2,
            array(
                'answer' => $answers[$a],
                'question_id' => $question_id->id,
            ),
            array(
                '%s',
                '%s'
            )
        );
    }
    
    
    $questions = $wpdb->get_results('SELECT `id`, `question` FROM `wp_tco_poll_questions` ORDER BY `id` DESC ', ARRAY_A);
  
?>
<div class="container row" id="pollOptions">
    <div class="col-6">
        <form method="post" action="">
            <div style="display: flex;color: #4cae4c; flex-direction: column">
                <h3 class="text-center mt-5" style="color: #4cae4c; font-weight: bolder">TCO Poll</h3>
                <div id="form-inputs">
                    <div class="form-group">
                        <label for="question">Set the Question</label>
                        <input name="question" type="text" id="question" class="form-control" placeholder="Question">
                    </div>
                </div>
                <div class="form-group">
                    <button type="button" id="addAnswer" class="btn btn-secondary btn-group-lg">+Add Answer</button>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-group-lg">
                </div>
            </div>
        </form>
    </div>
    <div class="col-6">
        <form method="post" action="">
            <div style="display: flex;color: #4cae4c; flex-direction: column;">
                <h3 class="text-center mt-5" style="color: #4cae4c; font-weight: bolder">Current Poll</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Question</th>
                        <th scope="col" class="mr-0">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($questions as $q) { ?>
                        <tr>
                            <th scope="col"><?= $q["question"] ?></th>
                            <td scope="col">
                                <button type="button" class=" btn btn-outline-success btn-sm mr-0   show "
                                        data-quest="<?= $q["id"] ?>" data-toggle="modal" data-target="#exampleModal">Show
                                </button>
                                <button type="button" class=" btn btn-outline-danger btn-sm mr-0  delete"
                                        data-quest="<?= $q["id"] ?>" data-toggle="modal" data-target="#exampleModal">Delete
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Poll Answers</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
</div>
<script type='text/javascript'>
    window.addEventListener('load', function () {
        let container = jQuery("#form-inputs");
        let addAnswer = jQuery('#addAnswer');
        let i = 0;
        addAnswer.on('click', function () {
            container.append(`<div class="form-group" id="answer-div"><label for="answer">Answer</label><input type='text' name=${i++} class='form-control' placeholder='Enter the Answer'></div>`);
        });
    })
    jQuery(document).ready(function ($) {
        jQuery(".show").on("click", function (event) {
            jQuery.ajax({
                url: ajaxurl, // Since WP 2.8 ajaxurl is always defined and points to admin-ajax.php
                method: 'post',
                data: {
                    'action': 'poll_ajax_request', // This is our PHP function below
                    'quest': jQuery(this).data("quest")// This is the variable we are sending via AJAX
                },
                success: res => {
                    console.log(res)
                    jQuery('.modal-body').empty().append(res)
                    // jQuery('#pollOptions').parent().empty().append(res)
                },
                error: err => {
                    console.log("it isn't working");
                }
            })
        })
    })
</script>

<style>
    input[type="text"]:focus,
    .uneditable-input:focus {
        border-color: rgba(126, 239, 104, 0.8);
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(126, 239, 104, 0.6);
        outline: 0 none;
    }


</style>

