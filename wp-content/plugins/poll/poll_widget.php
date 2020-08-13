<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php
  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
  $ip=$_SERVER['REMOTE_ADDR'];
  $poll = $wpdb->get_results('SELECT `id`, `question`, `answers` FROM `wp_tco_poll` ORDER BY `id` DESC ', ARRAY_A);
  $question = $poll[0]['question'];
  $answers = explode('/', $poll[0]['answers']);
  $results = array();
  
  $tableName1 = "wp_tco_poll_results";
  $tableName2 = "wp_tco_poll_ip";
  $dbPrefix = DB_NAME;
  $sql1 = "CREATE TABLE `$dbPrefix`.`$tableName1` ( `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT , `question` TEXT NOT NULL , `answer` TEXT NOT NULL , `count` INT NOT NULL ) ENGINE = InnoDB";
  $a1 = maybe_create_table($tableName1, $sql1);
  $sql2 = "CREATE TABLE `$dbPrefix`.`$tableName2` ( `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT , `question` TEXT NOT NULL , `ip` TEXT NOT NULL) ENGINE = InnoDB";
  $a2 = maybe_create_table($tableName2, $sql2);

  $result = $wpdb->get_results("SELECT  `answer`,`count` FROM `wp_tco_poll_results` WHERE   `question`='$question'", ARRAY_A);
  $ips= $wpdb->get_results("SELECT  `question`,`ip` FROM `wp_tco_poll_ip` WHERE   `question`='$question'", ARRAY_A);

  $all_counts=0;
  foreach($result as $r){
      $all_counts+=$r["count"];
  }
    if (isset($_POST['answer'])) {
      $checked = $_POST['answer'];
        $wpdb->insert(
            $tableName2,
            array(
                'question' => $question,
                'ip' => $ip
            ),
            array(
                '%s',
                '%s'
            )
        );
        $poll_results = $wpdb->get_row("SELECT `id`, `count` , `answer`,`question` FROM `wp_tco_poll_results` WHERE `answer`='$checked' && `question`='$question'", ARRAY_A);
      if ($poll_results["count"] < 1) {
          $wpdb->insert(
              $tableName1,
              array(
                  'question' => $question,
                  'answer' => $checked,
                  'count' => 1
              ),
              array(
                  '%s',
                  '%s',
                  '%d'
              )
          );
      } else {
          $results[$checked] = $poll_results['count'] + 1;
          $res = $results[$checked];
          $answer_id = $poll_results['id'];
          $quest = $poll_results['question'];
          $update = $wpdb->query("UPDATE wp_tco_poll_results SET `count`='$res',`answer`='$checked' WHERE `id`='$answer_id'");
      }
  }
    
    $k = 0;
    foreach ($ips as $i) {
        if ($i["ip"] != $_SERVER['REMOTE_ADDR'] && $i["question"] != $question) $k++;
    };
    
    
    require_once "poll_widget_form.php";
?>
