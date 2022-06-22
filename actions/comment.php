<?php
session_start();
include('../admin/include/dbConnect.php');
include('../admin/include/helper.php');
$created_by = $_SESSION['SESS_USER_TOKEN2'];
$comment = $_POST['comment'];
$token = $_POST['token'];
$created_at = $current_date_time_local;

$stmt = $db->prepare("INSERT INTO comments(token, comment, created_by, created_at) VALUES (?, ?, ?, ?)");
$stmt->bindParam(1, $token);
$stmt->bindParam(2, $comment);
$stmt->bindParam(3, $created_by);
$stmt->bindParam(4, $created_at);
$stmt->execute();

header("location:../details.php?token=".$token."");