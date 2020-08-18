<div class="row " id="result-div">
    <div class="container">
        <div class="panel-heading  rounded mb-0 p-2 bg-danger">
            <h6 class=" panel-title text-center text-white m-0">
                <?php echo $question ?>
            </h6>
        </div>
        <div class="panel-body mt-0">
            <ul class="list-group ">
                <?php for($aa=0;$aa<count($vote_ans);$aa++) { ?>
                    <li class="list-group-item p-1">
                        <div class="ans " style="display: flex;justify-content: space-between;align-items: center">
                            <p style="word-break: break-all; font-size: 15px"><?= $vote_ans[$aa] ?> <?php //var_dump($vote_query);?></p>
                            <div class="result"><p><?= round($votes[$aa]*100/$all_count)?>%</p></div>
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
    width:35px;
    height: 35px;
    border: 1px solid #dc3545;
    background-color: #dc3545;
    border-radius: 50px;
    color: #ffffff;
    font-size: small;
    justify-content: center;
    display: flex;
    align-items: center;
    transition: .3s all;
}

div.result:hover {
    opacity: .8;
    font-weight: bold;
}

p {
    margin-bottom: 0;
}
</style>

