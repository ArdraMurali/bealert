<?php
session_start();
include('../admin/include/dbConnect.php');
include('../admin/include/helper.php');
$token = $_GET['token'];

$db->prepare("DELETE FROM feedbacks WHERE token = '$token'")->execute();

header("location:../feedback.php");
