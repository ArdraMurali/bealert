<?php
session_start();
include('../include/dbConnect.php');
include('../include/helper.php');
$token = $_GET['token'];;

$db->prepare("UPDATE malicious_websites SET status = 0, approved = 0 WHERE token = '$token'")->execute();

header("location:../malicious-websites-reported.php");
