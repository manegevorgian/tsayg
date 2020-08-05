<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
$poll = $wpdb->get_results('SELECT `id`, `question`, `answers` FROM `wp_tco_poll`',ARRAY_A);
$question=$poll[0]['question'];
$answers=explode('/',$poll[0]['answers']);
?>

<div class="row">
    <div class="container">
        <div class="panel panel-primary ">
            <div class="panel-heading  rounded mb-0 bg-danger">
                <h5 class="panel-title text-center text-white m-0">
                    <?php echo $question ?>
                </h5>
            </div>
            <div class="panel-body mt-0">
                <ul class="list-group">
                    <?php foreach ($answers as $answer){ ?>
                    <li class="list-group-item">
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios">
                                <h4 class="text-center" ><?php echo $answer ?></h4>
                            </label>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="panel-footer">
                <button type="button" class="btn btn-danger btn-sm mt-3">
                    Vote</button>
        </div>
    </div>
</div>
