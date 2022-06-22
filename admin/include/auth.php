<?php
session_start();
if (!isset($_SESSION['SESS_USER_TOKEN']) || trim($_SESSION['SESS_USER_TOKEN']) == '') {
    header("location: ../?expired");
}
$user = trim($_SESSION['SESS_USER_TOKEN']);
