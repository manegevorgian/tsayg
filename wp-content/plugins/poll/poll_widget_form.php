<?php   require_once "poll_widget_results.php"?>
<div class="row">
    <div class="container ">
        <div class="panel rounded panel-primary ">
            <form action="" method="post" id="poll-form" class="<?php  if($k==count($results)) echo "active";?>">
                <div class="panel-heading  rounded mb-0 p-2 bg-danger">
                    <h5 class="panel-title text-center text-white m-0">
                      <?php echo $question ?>
                    </h5>
                </div>
                <div class="panel-body mt-0">
                    <ul class="list-group ">
                      <?php foreach ($answers as $answer) { ?>
                          <li class="list-group-item p-1">
                              <div class="radio">
                                  <label style="word-break: break-all">
                                      <input type="radio" name="answer" class="mr-2 " value="<?php echo $answer["answer"] ?>">
                                    <?= $answer["answer"] ?>
                                  </label>
                              </div>
                          </li>
                      <?php } ?>
                      
                    </ul>
                </div>
                <div class="panel-footer d-flex justify-content-end">
                    <button type="submit" id="btn" class="btn btn-danger btn-sm mt-2">Vote</button>
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
<script>
    window.addEventListener('load',function () {
       const form = jQuery("#poll-form");
       const result = jQuery("#result-div");
       if(form.hasClass('active')) {
           form.on("submit", function (event) {
               event.preventDefault();
               jQuery.ajax({
                   url: '',
                   method: 'post',
                   data: form.serialize(),
                   success: res => {
                       form.css('display', 'none');
                       result.css('display', 'block');
                       result.addClass("active");
                       form.removeClass("active");
                   },
                   error: err => {
                       console.log("it isn't working");
                   }
               })
           });
       }
       else {
           form.css('display', 'none');
           result.css('display', 'block');
           result.addClass("active");
           form.removeClass("active");
       }
    })
</script>