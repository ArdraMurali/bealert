<?php
session_start();
include('../include/dbConnect.php');
include('../include/helper.php');
$token = $_GET['token'];
$status = $_GET['status'];

$db->prepare("UPDATE malicious_websites SET status = '$status' WHERE token = '$token'")->execute();

header("location:../malicious-websites-reported.php");
