<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <form method="post" action="">
        <div class="form-group container" style="display: flex;color: #4cae4c; flex-direction: column; width:30%">
            <h3 class="text-center" style="color: #4cae4c; font-weight: bolder" >TCO Poll</h3>
            <label for="question">Set the Question</label>
            <input name="question" type="text" id="question" placeholder="Question">
            <label for="1">Answer 1</label>
            <input name="ans1" type="text" id="1" placeholder="1">
            <label for="2">Answer 2</label>
            <input name="ans2" type="text" id="2"  placeholder="2">
            <label for="3">Answer 3</label>
            <input name="ans3" type="text"  id="3" placeholder="3">
            <label for="4">Answer 4</label>
            <input name="ans4" type="text"  id="4" placeholder="4">
            <label for="5">Answer 5</label>
            <input name="ans5" type="text" id="5"  placeholder="5">
            <label for="6">Answer 6</label>
            <input name="ans6" type="text"  id="6" placeholder="6" class="success">
            <input type="submit" class="btn btn-success btn-group-lg">Submit</input>
        </div>
    </form>


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
if(checking($_POST['ans1'])){
    array_push($answers,$_POST['ans1']);
}
if(checking($_POST['ans2'])){
    array_push($answers,$_POST['ans2']);
}
if(checking($_POST['ans3'])){
    array_push($answers,$_POST['ans3']);
}
if(checking($_POST['ans4'])){
    array_push($answers,$_POST['ans4']);
}
if(checking($_POST['ans5'])){
    array_push($answers,$_POST['ans5']);
}
if(checking($_POST['ans6'])){
    array_push($answers,$_POST['ans6']);
}

var_dump($answers);