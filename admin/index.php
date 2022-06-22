<?php
session_start();
if (isset($_SESSION['SESS_USER_TOKEN']) && trim($_SESSION['SESS_USER_TOKEN']) != '') {
    header("location: ../dashboard.php");
}

$err = '';
if (isset($_GET['signout'])) {
    $err = 'Signed out successfully';
} elseif (isset($_GET['expired'])) {
    $err = 'Session expired, please login again.';
}
if (isset($_POST['submit'], $_POST['email'], $_POST['password'])) {
    include('include/dbConnect.php');
    $email = $_POST['email'];
    $password = $_POST['password'];

    $qryadmn = $db->prepare("SELECT * FROM users WHERE email = '$email' AND password = '$password' AND user_type = 'admin'");
    $qryadmn->execute();
    if ($qryadmn->rowcount() > 0) {
        $rowadmn = $qryadmn->fetch();
        $_SESSION['SESS_USER_ID'] = $rowadmn['id'];
        $_SESSION['SESS_USER_TOKEN'] = $rowadmn['token'];
        $_SESSION['SESS_USER_NAME'] = $rowadmn['name'];
        $_SESSION['SESS_USER_TYPE'] = $rowadmn['user_type'];
        $_SESSION['SESS_USER_EMAIL'] = $rowadmn['email'];
        header("location: dashboard.php");
        exit();
    } else {
        $err = 'Username or password is wrong! Try Again.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BELAERT ADMIN PANEL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="main-wrapper">
        <div class="account-page">
            <div class="container">
                <div class="account-box">
                    <div class="account-wrapper">
                    <h3 class="account-title text-success mb-0">BELAERT ADMIN&nbsp;PANEL</h3>
                        <hr>
                        <div class="account-logo">
                            <h3 class="text-left">LOGIN</h3>
                        </div>
                            <form action="" method="post">
                            <div class="form-group">
                                <!-- <label>Username</label> -->
                                <input type="email" name="email" class="form-control" placeholder="Enter username" required>
                            </div>
                            <div class="form-group">
                                <!-- <label>Password</label> -->
                                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                            </div>
                            <?php if ($err != '') {
                                echo '<p class="text-danger text-center">' . $err . '</p>';
                            } ?>
                            <div class="form-group text-center custom-mt-form-group">
                                <button class="btn btn-primary float-right btn-lg w-50" type="submit" name="submit">LOGIN</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/jquery.slimscroll.js"></script>

    <script src="assets/js/app.js"></script>
</body>

</html>