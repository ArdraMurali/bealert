<?php
session_start();
include('../admin/include/dbConnect.php');
include('../admin/include/helper.php');
$token = genToken();
$created_by = $_SESSION['SESS_USER_TOKEN2'];
$link = $_POST['link'];
$tags = $_POST['tags'];
$description = $_POST['description'];
$technical = $_POST['technical'];
$status = 0;
$created_at = $current_date_time_local;

$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$image_name = addslashes($_FILES['image']['name']);
$image_size = getimagesize($_FILES['image']['tmp_name']);
$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
$image = genToken() . '.' . $ext;
move_uploaded_file($_FILES["image"]["tmp_name"], "../files/" . $image);

$stmt = $db->prepare("INSERT INTO malicious_websites(token, link, tags, description, image, created_by, technical, created_at, status, approved) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bindParam(1, $token);
$stmt->bindParam(2, $link);
$stmt->bindParam(3, $tags);
$stmt->bindParam(4, $description);
$stmt->bindParam(5, $image);
$stmt->bindParam(6, $created_by);
$stmt->bindParam(7, $technical);
$stmt->bindParam(8, $created_at);
$stmt->bindParam(9, $status);
$stmt->bindParam(10, $status);
$stmt->execute();

header("location:../report.php");
