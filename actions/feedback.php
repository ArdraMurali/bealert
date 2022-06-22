<?php
session_start();
include('../admin/include/dbConnect.php');
include('../admin/include/helper.php');
$token = genToken();
$created_by = $_SESSION['SESS_USER_TOKEN2'];
$subject = $_POST['subject'];
$feedback = $_POST['feedback'];
$created_at = $current_date_time_local;

$stmt = $db->prepare("INSERT INTO feedbacks(token, subject, created_by, created_at, feedback) VALUES (?, ?, ?, ?, ?)");
$stmt->bindParam(1, $token);
$stmt->bindParam(2, $subject);
$stmt->bindParam(3, $created_by);
$stmt->bindParam(4, $created_at);
$stmt->bindParam(5, $feedback);
$stmt->execute();

header("location:../feedback.php");