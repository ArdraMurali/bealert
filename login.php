<?php
session_start();
include('admin/include/dbConnect.php');
include('admin/include/helper.php');
if (isset($_SESSION['SESS_USER_TOKEN2']) && trim($_SESSION['SESS_USER_TOKEN2']) != '') {
    echo '<script>window.location.href = "../profile.php";</script>';
}
$err = '';
$err2 = '';
$redirect = '../profile.php';
$otpVerification = 0;
if (isset($_GET['signout'])) {
    $err = 'Logged out successfully';
} elseif (isset($_GET['expired'])) {
    $err = 'Session expired, please login again.';
}
if (isset($_GET['login'])) {
    $err2 = 'Registration successfull, you can login now.';
}
if (isset($_GET['updated'])) {
    $err2 = 'Password updated, please login with new password.';
}
if (isset($_POST['submit'], $_POST['email'], $_POST['password'])) {
    $remember_token = genToken();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $redirect = $_POST['redirect'];

    $qryadmn = $db->prepare("SELECT * FROM users WHERE email = '$email' AND password = '$password' AND user_type = 'user'");
    $qryadmn->execute();
    if ($qryadmn->rowcount() > 0) {
        $rowadmn = $qryadmn->fetch();
        if ($rowadmn['status'] == 1) {
            $_SESSION['SESS_USER_TOKEN2'] = $rowadmn['token'];
            $_SESSION['SESS_USER_NAME2'] = $rowadmn['name'];
            $_SESSION['SESS_USER_TYPE2'] = $rowadmn['user_type'];
            $_SESSION['SESS_USER_EMAIL2'] = $rowadmn['email'];
            $_SESSION['SESS_USER_CONTACT2'] = $rowadmn['contact_no'];

            setcookie("LU001", $remember_token, time() + (10 * 365 * 24 * 60 * 60), '/');

            $db->prepare("UPDATE users SET remember_token = '$remember_token' WHERE  token = '" . $rowadmn['token'] . "'")->execute();

            echo '<script>window.location.href = "'.$redirect.'";</script>';
        } else {
            $err = 'Something went wrong!<br>Contact BELAERT to fix.';
        }
    } else {
        $err = 'Username or password is wrong! Try Again.';
    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>

    <meta charset="UTF-8">
    <title>LOGIN | BELAERT</title>
    <meta name="author" content="themsflat.com">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" type="text/css" href="stylesheet/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="revolution/css/settings.css">

    <link rel="stylesheet" type="text/css" href="stylesheet/style.css">

    <link rel="stylesheet" type="text/css" href="stylesheet/colors/color1.css" id="colors">

    <link rel="stylesheet" type="text/css" href="stylesheet/responsive.css">

    <link href="icon/apple-touch-icon-48-precomposed.png" rel="apple-touch-icon-precomposed">
    <link href="icon/apple-touch-icon-32-precomposed.png" rel="apple-touch-icon-precomposed">
    <link href="icon/favicon.png" rel="shortcut icon">
</head>

<body>
    <div class="boxed blog">
        <?php include("include/header.php"); ?>
        <div class="page-title">
            <div class="title-heading">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-title-heading">
                                <h1 class="h1-title">LOGIN</h1>
                            </div>
                            <ul class="breadcrumbs">
                                <li><a href="#" title="">Home</a></li>
                                <li class="dot">/</li>
                                <li>LOGIN</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="flat-row flat-contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3 col-sm-10 offset-sm-1">
                        <div class="top-title center">
                            <h2>LOGIN</h2>
                            <p>A step away from the easy way to find a malicious link</p>
                        </div>
                        <div class="form-contact-form">
                            <form action="login.php" method="post" accept-charset="utf-8" autocomplete="off">
                            <input type="hidden" name="redirect" value="<?php echo $redirect ?>">
                                <div id="subscribe-content-1">
                                    <div class="contact-form-email contact-form">
                                        <input type="email" name="email" id="email" placeholder="Your Email" required autofocus />
                                    </div>
                                    <div class="contact-form-email contact-form">
                                        <input type="password" name="password" id="password" placeholder="Your Password" required />
                                    </div>
                                    <?php if ($err != '') {
                                        echo '<h6 class="text-danger text-center alert-danger py-3">' . $err . '</h6><br>';
                                    } ?>
                                    <?php if ($err2 != '') {
                                        echo '<h6 class="text-success text-center alert-success py-3">' . $err2 . '</h6><br>';
                                    } ?>
                                    <div class="btn-contact-form right">
                                        <button type="submit" name="submit" class="flat-button-form border-radius-2">LOGIN</button>
                                    </div>
                                    <h4 class="text-center mt-5"><a href="register.php">New here? Register now.</a></h4>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include("include/footer.php"); ?>
    </div>

    <script type="text/javascript" src="javascript/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/tether.min.js"></script>
    <script type="text/javascript" src="javascript/bootstrap.min.js"></script>
    <script type="text/javascript" src="javascript/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="javascript/owl.carousel.js"></script>
    <script type="text/javascript" src="javascript/jquery.easing.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key="></script>
    <script type="text/javascript" src="javascript/gmap3.min.js"></script>
    <script type="text/javascript" src="javascript/jquery.cookie.js"></script>
    <script type="text/javascript" src="javascript/waypoints.min.js"></script>
    <script type="text/javascript" src="javascript/main.js"></script>

</body>

</html>