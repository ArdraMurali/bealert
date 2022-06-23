<?php
session_start();
include('../include/dbConnect.php');
include('../include/helper.php');
$token = $_POST['token'];
$reply = $_POST['reply'];

$db->prepare("UPDATE feedbacks SET reply = '$reply' WHERE token = '$token'")->execute();

header("location:../feedback.php");
