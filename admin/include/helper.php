<?php
function genToken()
{
    return 't' . sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x', mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0x0fff) | 0x4000, mt_rand(0, 0x3fff) | 0x8000, mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff));
}
date_default_timezone_set("Asia/Kolkata");
$current_date_time_local_min = date("Y-m-d", time()).'T'.date("h:i", time());
$current_date_time_local = date("Y-m-d H:i:s", time());
$today_local = date("Y-m-d");
$current_time_local = date("H:i:s", time());
$current_time_local_plus_1 = date('H:i', strtotime('+1 hour', strtotime($current_time_local)));
$current_date_time_local_plus_2 = date('Y-m-d H:i:s', strtotime('+2 hour', strtotime($current_date_time_local)));
date_default_timezone_set('UTC');
$current_date_time = date("Y-m-d H:i:s", time());


function date_convert($date)
{
    $date = date_create($date);
    return date_format($date, "d M Y");
}
function time_convert($date)
{
    $date = date_create($date);
    return date_format($date, "d/m/Y h:i A");
}
function time_convert2($date)
{
    $date = date_create($date);
    return date_format($date, "d/m/Y h:i:s A");
}

function time_differenceInSeconds($time)
{
    date_default_timezone_set("Asia/Kolkata");
    $current_date_time_local = date("Y-m-d H:i:s", time());
    $timeFirst  = strtotime($time);
    $timeSecond = strtotime($current_date_time_local);
    $differenceInSeconds = $timeSecond - $timeFirst;
    return $differenceInSeconds;
}
function time_differenceInSeconds_2($time, $time2)
{
    $timeFirst  = strtotime($time);
    $timeSecond = strtotime($time2);
    $differenceInSeconds = $timeSecond - $timeFirst;
    return $differenceInSeconds;
}