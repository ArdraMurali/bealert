<?php
include('include/auth.php');
include('include/dbConnect.php');
include('include/helper.php');
$err = '';
$token = $_SESSION['SESS_USER_TOKEN'];

if (isset($_POST['cPassword'], $_POST['nPassword'], $_POST['rPassword'])) {
    $stmt = $db->prepare("SELECT * FROM users WHERE token = ? LIMIT 0,1");
    $stmt->bindParam(1, $token);
    $stmt->execute();
    $usercount = $stmt->rowCount();
    if ($usercount > 0) {
        $user_rows = $stmt->fetch(PDO::FETCH_ASSOC);
        if (trim($_POST['cPassword']) == $user_rows['password']) {
            if (trim($_POST['nPassword']) == trim($_POST['rPassword'])) {
                $nPassword = trim($_POST['nPassword']);
                $updateData = $db->prepare("UPDATE users SET password = :password WHERE token = :token");
                $updateData->bindParam(':password', $nPassword, PDO::PARAM_STR);
                $updateData->bindParam(':token', $token, PDO::PARAM_STR);
                $updateData->execute();
                $err = 'Password Updated.';
                header("location:logout.php");
            } else {
                $err = 'Repeat password is not matching.';
            }
        } else {
            $err = 'Current password is wrong.';
        }
    } else {
        $err = 'Somehting went wrong wrong.';
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
                            <h3 class="text-left">UPDATE PASSWORD</h3>
                        </div>
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="password" name="cPassword" class="form-control" placeholder="Current password" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="nPassword" class="form-control" placeholder="New password" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="rPassword" class="form-control" placeholder="Repeat new password" required>
                            </div>
                            <?php if ($err != '') {
                                echo '<p class="text-danger text-center">' . $err . '</p>';
                            } ?>
                            <div class="form-group text-center custom-mt-form-group">
                                <button class="btn btn-primary float-right btn-lg w-100" type="submit" name="submit">UPDATE PASSWORD</button>
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <a href="dashboard.php" class="text-danger text-center d-block" style="text-decoration: none;">CANCEL</a>
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