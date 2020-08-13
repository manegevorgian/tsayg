<div class="row " id="result-div">
    <div class="container">
        <div class="panel-heading  rounded mb-0 p-2 bg-danger">
            <h5 class="panel-title text-center text-white m-0">
                <?php echo $question ?>
            </h5>
        </div>
        <div class="panel-body mt-0">
            <ul class="list-group ">
                <?php foreach ($result as $r) { ?>
                    <li class="list-group-item p-1">
                        <div class="ans">
                            <p style="word-break: break-all"><?= $r["answer"] ?></p>
                            <div class="result" style="background-image: linear-gradient(to right, #dc3545 <?= $r["count"]*100/$all_counts ?>%, #ffffff <?= $r["count"]*100/$all_counts ?>% )"></div>
                        </div>
                    </li>
                <?php } ?>
        
            </ul>
        </div>
    </div>
</div>

<style>
    #result-div{
        display:none;
    }
.result{
    width:300px;
    height: 15px;
    border: 1px solid #dc3545;
    border-radius: 50px;
    margin-top: 2px;
}
    p{
        margin-bottom: 0;
    }
</style>

