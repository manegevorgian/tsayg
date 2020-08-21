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
$max_results=10;//&maxResults='.$max_results.'
$videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channel_ID.'&key='.$API_key.''));
//$videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/playlistItems?order=date&part=snippet&channelId='.$channel_ID.'&key='.$API_key.''));
//var_dump(file_get_contents('https://www.googleapis.com/youtube/v3/playlistItems?order=date&channelId='.$channel_ID.'&key='.$API_key.''));wp_die();
?>
<div class=".d-sm-flex p-2 mt-0 row justify-content-center">
<?php
foreach($videoList->items as $item){
    //Embed video
    if(isset($item->id->videoId)){
        echo '<div class="youtube-video  m-3 w-25 h-25 ">
            <iframe class="embed-responsive-item _rounded " style="" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe>
            <h6 class="m-0" >'. $item->snippet->title .'</h6>
        </div>';
    }
}
?>
</div>
</body>
</html>