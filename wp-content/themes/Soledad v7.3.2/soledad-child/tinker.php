<?php

$query1 = new wpdb('root', '', 'tsayg', 'localhost');
$tinker = $query1->get_results('SELECT `content` FROM `tinker` ORDER BY `id` DESC ', ARRAY_A);
$content= $tinker[0]['content'];
?>
<style>
    .tcontainer {
        width: 100%;
        overflow: hidden; /* Hide scroll bar */

    }

    /* MIDDLE CONTAINER */
    .ticker-wrap {
        width: 100%;
        height: 4%;
        padding-top: 2px;
        padding-left: 100%; /* Push contents to right side of screen */
        background-color: #dd0000;
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
        animation-duration: 10s;
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
<div class="tcontainer">
    <div class="ticker-wrap">
        <div class="ticker-move">
            <div class="ticker-item"><?php echo $content; ?></div>
        </div>
    </div>
</div>