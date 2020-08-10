<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
$poll = $wpdb->get_results('SELECT `id`, `question`, `answers` FROM `wp_tco_poll` ORDER BY `id` DESC ',ARRAY_A);
$question=$poll[0]['question'];
$answers=explode('/',$poll[0]['answers']);
$results=array();

$tableName = "wp_tco_poll_results";
$dbPrefix = DB_NAME;
$sql = "CREATE TABLE `$dbPrefix`.`$tableName` ( `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT , `question` TEXT NOT NULL , `answer` TEXT NOT NULL , `count` INT NOT NULL ) ENGINE = InnoDB";
$a = maybe_create_table($tableName, $sql);


$poll_results = $wpdb->get_results('SELECT `id`, `count` , `answer`,`question` FROM `wp_tco_poll_results` ',ARRAY_A);
//var_dump($poll_results);
   
    var_dump($results);
if(isset($_POST['answer'])){
    $checked=$_POST['answer'];
    //$results[$checked] = 1;
//    for($i=0;$i<count($answers);$i++) {
//        $results[$checked] = 1;
//
//    }
    
    if ($poll_results[0]["count"] < 1) {
//
        $wpdb->insert(
            $tableName,
            array(
                    'question' => $question,
                    'answer' => $checked,
                    'count' => $results[$checked]
            ),
            array(
                    '%s',
                    '%s',
                    '%d'
            )
        );
    }
    else {
        $results[$checked]=$poll_results[0]['count']+1;
        $res=$results[$checked];
        $answer_id=$poll_results[0]['id'];
        $quest=$poll_results[0]['question'];
        //echo $results[$checked];

        $update = $wpdb->query("UPDATE wp_tco_poll_results SET `count`='$results[$checked]',`answer`='$checked' WHERE `answer`='$res'");
        }
   // var_dump($results);
    }

//var_dump($results);
?>

<div class="row">
    <div class="container ">
        <div class="panel rounded panel-primary ">
            <form action="" method="post">
                <div class="panel-heading  rounded mb-0 p-2 bg-danger">
                    <h5 class="panel-title text-center text-white m-0">
                        <?php echo $question ?>
                    </h5>
                </div>
                <div class="panel-body mt-0">
                    <ul class="list-group ">
                        <?php foreach ($answers as $answer){ ?>
                        <li class="list-group-item p-1" >
                            <div class="radio">
                                <label style="word-break: break-all">
                                    <input type="radio" name="answer" class="mr-2 " value="<?php echo $answer ?>">
                                    <?= $answer ?>
                                </label>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="panel-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-danger btn-sm mt-2">Vote</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <style>
        input[type='radio']:after {
            width: 15px;
            height: 15px;
            border-radius: 15px;
            top: -2px;
            left: -1px;
            position: relative;
            background-color: #d1d3d1;
            content: '';
            display: inline-block;
            visibility: visible;
            border: 2px solid white;
        }

        input[type='radio']:checked:after {
            width: 15px;
            height: 15px;
            border-radius: 15px;
            top: -2px;
            left: -1px;
            position: relative;
            background-color: #dc3545;
            content: '';
            display: inline-block;
            visibility: visible;
            border: 2px solid white;
        }
    </style>