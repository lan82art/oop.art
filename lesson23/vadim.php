<?php
function secondsToTime($num)
{
    $time = [];
    $res = '';
    if ($num >= 31556926 ) {
        $time['years'] = $num / 31556926 % 12;
        $res = $num - (31556926 * $time['years']);
    }
    //months
    if (!empty($res) && $res >= 2629743 ) {
        $time['months'] = $res / 2629743 % 30;
        $res = $res - (2629743 * $time['months']);
    }elseif (empty($res) && $num >= 2629743) {
        $time['months'] = $num / 2629743 % 30;
        $res = $num - (2629743 * $time['months']);
    }
    //days
    if (!empty($res) && $res >= 86400 ) {
        $time['days'] = $res / 86400  % 24;
        $res = $res - (86400  * $time['days']);
    }elseif (empty($res) && $num >= 86400) {
        $time['days'] = $num / 86400  % 24;
        $res = $num - (86400  * $time['days']);
    }
    //hours
    if (!empty($res) && $res >= 3600) {
        $time['hours'] = $res / 3600  % 60;
        $res = $res - (3600  * $time['hours']);
    }elseif (empty($res) && $num >= 3600) {
        $time['hours'] = $num / 3600  % 60;
        $res = $num - (3600  * $time['hours']);
    }
    //minutes
    if (!empty($res) && $res % 60  >= 1) {
        $time['minutes'] = $res / 60 % 60;
        $res = $res - (60 * $time['minutes']);
    }elseif (empty($res) && $num >= 60) {
        $time['minutes'] = $num / 60 % 60;
        $res = $num - (60 * $time['minutes']);
    }
    if ($res >=1){
        $time['seconds'] = $res;
    }
    //secs

    return  $time;
}

var_dump(secondsToTime(1497010985));