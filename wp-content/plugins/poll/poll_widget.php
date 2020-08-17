<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php
  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
  $ip=$_SERVER['REMOTE_ADDR'];
  $poll = $wpdb->get_results('SELECT `id`, `question` FROM `wp_tco_poll_questions` ORDER BY `id` DESC ', ARRAY_A);
  $question = $poll[0]['question'];
  $question_id=$wpdb->get_row("SELECT `id` FROM `wp_tco_poll_questions` WHERE `question`='$question'",ARRAY_A);
  $q_id=$question_id["id"];
  $answers = $wpdb->get_results("SELECT `id`, `answer` FROM `wp_tco_poll_answers` WHERE `question_id`='$q_id'", ARRAY_A);
  $tableName = 'wp_tco_poll_results';
  $dbPrefix = DB_NAME;
  $sql = "CREATE TABLE `$dbPrefix`.`$tableName` ( `id` INT NOT NULL AUTO_INCREMENT , `question_id` TEXT NOT NULL, `answer_id` INT NOT NULL, `ip` TEXT NOT NULL, `voted_at` TIMESTAMP  DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id`)) ENGINE = InnoDB";
  $a = maybe_create_table($tableName, $sql);
    if (isset($_POST['answer'])) {
        $checked = $_POST['answer'];
        $a_id=$wpdb->get_row("SELECT `id` FROM `wp_tco_poll_answers` WHERE `answer`='$checked'",ARRAY_A);
        var_dump($a_id);
        $wpdb->insert(
            $tableName,
            array(
                'question_id' => $q_id,
                'answer_id' => $a_id["id"],
                'ip' => $ip
            ),
            array(
                '%d',
                '%d',
                '%s'
            )
        );
    }
  $results= $wpdb->get_results("SELECT `answer_id`,`question_id`,`ip` FROM `wp_tco_poll_results` WHERE `question_id`='$q_id'",ARRAY_A);
    $k = 0;
    foreach ($results as $r) {
        if ($r["ip"] != $_SERVER['REMOTE_ADDR'] && $r["question_id"] != $q_id) $k++;
    };
    $voits=[];
    $voit_ans=[];
   $all_count_query=$wpdb->get_row("SELECT COUNT(`question_id`) FROM `wp_tco_poll_results` WHERE `question_id`='$q_id'",ARRAY_A);
    $all_count=$all_count_query["COUNT(`question_id`)"];
   foreach ($answers as $answer){
       $a=$answer["id"];
       $voit_query=$wpdb->get_row("SELECT COUNT(`question_id`) FROM `wp_tco_poll_results`  WHERE `question_id`='$q_id' && `answer_id`='$a' GROUP BY `question_id`",ARRAY_A);
       
       array_push($voits,$voit_query["COUNT(`question_id`)"]);
       array_push($voit_ans,$answer["answer"]);
   }
   
    require_once "poll_widget_form.php";
?>
