<div class="row " id="result-div">
    <div class="container">
        <div class="panel-heading  rounded mb-0 p-2 bg-danger">
            <h6 class=" panel-title text-center text-white m-0">
                <?php echo $question ?>
            </h6>
        </div>
        <div class="panel-body mt-0">
            <ul class="list-group ">
                <?php for($a=0;$a<count($voit_ans);$a++) { ?>
                    <li class="list-group-item p-1">
                        <div class="ans " style="display: flex;justify-content: space-between;align-items: center">
                            <p style="word-break: break-all; font-size: 15px"><?= $voit_ans[$a] ?></p>
                            <div class="result bg-danger rounded-circle"><?= round($voits[$a]*100/$all_count)?>%</div>
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
    width:30px;
    height: 30px;
    border: 1px solid #dc3545;
    border-radius: 50px;
    padding: 3px;
    color: #ffffff;
    font-size: small;
    
}
    p{
        margin-bottom: 0;
    }
</style>

