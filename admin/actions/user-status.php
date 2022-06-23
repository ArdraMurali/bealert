<?php
session_start();
include('../include/dbConnect.php');
include('../include/helper.php');
$token = $_GET['token'];;
$status = $_GET['status'];

$db->prepare("UPDATE users SET status = '$status' WHERE token = '$token'")->execute();

header("location:../users.php");
