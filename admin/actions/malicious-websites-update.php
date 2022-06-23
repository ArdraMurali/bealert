<?php
session_start();
include('../include/dbConnect.php');
include('../include/helper.php');
$token = $_POST['token'];
$link = $_POST['link'];
$tags = $_POST['tags'];
$description = $_POST['description'];
$technical = $_POST['technical'];

$stmt = $db->prepare("UPDATE malicious_websites SET link = ?, tags = ?, description = ?, technical = ? WHERE token = ?");
$stmt->bindParam(1, $link);
$stmt->bindParam(2, $tags);
$stmt->bindParam(3, $description);
$stmt->bindParam(4, $technical);
$stmt->bindParam(5, $token);
$stmt->execute();

$image = $_FILES["image"]["name"];
if ($image != '') {
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $image = genToken() . '.' . $ext;
    move_uploaded_file($_FILES["image"]["tmp_name"], "../../files/" . $image);
    $db->prepare("UPDATE malicious_websites SET image = '$image' WHERE token = '$token'")->execute();
}

header("location:../malicious-websites-edit.php?token=" . $token . "");
