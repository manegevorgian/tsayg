<?php
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

$content_array = $wpdb->get_results('SELECT `id`,`content` FROM `wp_commercial_line`', ARRAY_A);
$content=[];
foreach ($content_array as $content_r){
 array_push($content,$content_r["content"]);
}
$contents=implode(" | " ,$content);
?>
<style>
    .tcontainer {
        width: 100%;
        overflow: hidden;
    }
    /* MIDDLE CONTAINER */
    .ticker-wrap {
        width: 100%;
        padding-bottom:  3px;
        padding-top:  3px;
        padding-left: 100%; /* Push contents to right side of screen */
        background-color: #dc3545;
        color: #fff0ef;
        font-weight: bold;
    }
    /* INNER CONTAINER */
    @keyframes ticker {
        0% { transform: translate3d(0, 0, 0); }
        100% { transform: translate3d(-100%, 0, 0); }
    }
    .ticker-move {
        /* Basically move items from right side of screen to left in infinite loop */
        display: inline-block;
        white-space: nowrap;
        padding-right: 100%;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
        animation-name: ticker;
        animation-duration: 20s;
    }
    .ticker-move:hover{
        animation-play-state: paused; /* Pause scroll on mouse hover */
    }
 /* ITEMS */
    .ticker-item{
        display: inline-block; /* Lay items in a horizontal line */
        padding: 0 2rem;
    }
</style>
<div class="tcontainer ">
    <div class="ticker-wrap">
        <div class="ticker-move ">
            <div class="ticker-item "> <?= $contents ?></div>
        </div>
    </div>
</div>