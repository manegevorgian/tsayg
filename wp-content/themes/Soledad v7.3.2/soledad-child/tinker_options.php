<html>
<head>

</head>
<body>
<h1 class="border border-color-accent border-color-accent-hover">Tinker</h1>
<form class="form-group " action="" method="post">
    <label for="txtArea" class="label">Input Tinker Content</label>
    <textarea name="tinker_input"  id="txtArea" rows="10" cols="70"></textarea>
    <input type="submit" class="btn btn-primary">
</form>
</body>
</html>

<style>
    h1{
    }
    .form-group{
        display: flex;
        flex-direction: column;
        width: 30%;
        font-weight: bold;
        margin: auto;
    }
    label{
        margin-bottom: 3%;
    }
</style>

<?php
//insert input
if( isset($_POST['tinker_input']) ) {

   $content=$_POST['tinker_input'];
    //deal with database in WordPress way
    $query1 =new wpdb('root','','tsayg','localhost');
    $tinker_table = $query1->prefix."tinker";
    $query1->insert(
        $tinker_table,
        array(
            'content'=>$content
        ),
        array(
            '%s'
        )
    );
}


?>
