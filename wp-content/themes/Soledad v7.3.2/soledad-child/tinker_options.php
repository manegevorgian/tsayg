<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-5">

<form class="form-group " action="" method="post">
    <h1 class=" text-primary text-center">Tinker</h1>
    <div id="form-inputs" class="w-300">

    </div>
    <div class="form-group">
        <button type="button" id="addNews" class="btn btn-secondary btn-group-lg">+Add New</button>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-group-lg">
    </div>
</form>
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
        console.log(news);
        // for(let i=1;i<=answers.length;i++){
        // $( "#answer" ).attr({
        //    name: i
        // });
        // }
    });

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
$news=[];
function checking($x){
    return $x!=""?true:false;
}
$name=0;
while(checking(isset($_POST["{$name}"]))){
    array_push($news,$_POST["{$name}"]);
    $name++;
}
$content=implode("/" ,$news);
    //deal with database in WordPress way
    $query1 =new wpdb(DB_USER,DB_PASSWORD,DB_NAME,DB_HOST);
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
?>
