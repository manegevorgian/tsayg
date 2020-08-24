<!--<html>-->
<!--<head>-->
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>-->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
<!--</head>-->
<!--<body>-->
<?php
//$API_key='AIzaSyApo-tO0sOdlICKBJGjnjsaA-pi7K9VHyE';
//$channel_ID='UCl2fuv_ejgujN06wEGmD-yA';
//$max_results=10;//&maxResults='.$max_results.'
//$videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channel_ID.'&key='.$API_key.''));
//?>
<!--<div class=".d-sm-flex p-2 mt-0 row justify-content-center">-->
<?php
//foreach($videoList->items as $item){
//    //Embed video
//    if(isset($item->id->videoId)){
//        echo '<div class="youtube-video  m-3 w-25 h-25 ">
//            <iframe class="embed-responsive-item _rounded " style="" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe>
//            <h6 class="m-0" >'. $item->snippet->title .'</h6>
//        </div>';
//    }
//}
//    global $wpdb;
//    $parent_id=$wpdb->get_results("SELECT `ID` FROM wp_posts WHERE `post_name` IN ('programs-3','programs-2','programs')",ARRAY_A);
//    $id_am=intval($parent_id[0]["id"]);
//    $id_ru=intval($parent_id[1]["id"]);
//    $id_en=intval($parent_id[2]["id"]);
//    $pages=[];
//    $p=get_page_children($id_am, $pages );
//    var_dump(($id_am));
//
//?>
<!--</div>-->
<!--</body>-->
<!--</html>-->

<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
    $API_key='AIzaSyApo-tO0sOdlICKBJGjnjsaA-pi7K9VHyE';
    $channel_ID='UCl2fuv_ejgujN06wEGmD-yA';
    $max_results=50;//&maxResults='.$max_results.'
    $videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/playlists?order=date&part=snippet&channelId='.$channel_ID.'&maxResults='.$max_results.'&key='.$API_key.''));
?>
<div class=".d-sm-flex p-2 mt-0 row justify-content-center">
    <?php
        global $wpdb;
        $parent_id=$wpdb->get_results("SELECT `ID` FROM wp_posts WHERE `post_name` IN ('programs-3','programs-2','programs')",ARRAY_A);
        $id_am=intval($parent_id[0]["ID"]);
        $id_ru=intval($parent_id[1]["ID"]);
        $id_en=intval($parent_id[2]["ID"]);
        $pages=[];
        $p=get_page_children($id_am, $pages );
        $titles=[];
        $ids=[];
        foreach($videoList->items as $item){
            if(isset($item->snippet->title)){
                array_push($titles,$item->snippet->title);
            }
            if(isset($item->id)){
                array_push($ids,$item->id);
            }
        }
    ?>
</div>
</body>
</html>