<?php
session_start();
include('admin/include/dbConnect.php');
include('admin/include/helper.php');
if (isset($_SESSION['SESS_USER_TOKEN2']) && trim($_SESSION['SESS_USER_TOKEN2']) != '') {
    header("location: ../profile.php");
}
$err = '';
$err2 = '';
if (isset($_POST['submit'], $_POST['name'], $_POST['email'], $_POST['contact_no'], $_POST['password'])) {
    $token = genToken();
    $user_type = 'user';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];
    $password = $_POST['password'];

    $qryadmn = $db->prepare("SELECT * FROM users WHERE email = '$email'");
    $qryadmn->execute();

    if ($qryadmn->rowcount() > 0) {
        $err = 'Email already registered with us.';
    } else {
        $db->prepare("INSERT INTO users (user_type, token, name, email, password, contact_no) VALUES ('$user_type', '$token', '$name', '$email', '$password', '$contact_no')")->execute();
?>
        <script>
            window.location.href = '../login.php?login';
        </script>
<?php
    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>

    <meta charset="UTF-8">
    <title>REGISTER | BELAERT</title>
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
    <style>
        #submitBtn:disabled {
            cursor: not-allowed
        }
    </style>
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
                                <h1 class="h1-title">REGISTER</h1>
                            </div>
                            <ul class="breadcrumbs">
                                <li><a href="#" title="">Home</a></li>
                                <li class="dot">/</li>
                                <li>REGISTER</li>
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
                            <h2>REGISTER</h2>
                            <p>A step away from the easy way to find a malicious link</p>
                        </div>
                        <div class="form-contact-form">
                            <form action="register.php" method="post" accept-charset="utf-8" autocomplete="off">
                                <div id="subscribe-content-1">
                                    <div class="contact-form-email contact-form">
                                        <label>Your Fullname<span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" placeholder="Your fullname" required autofocus />
                                    </div>
                                    <div class="contact-form-email contact-form">
                                        <label>Your Contact Number<span class="text-danger">*</span></label>
                                        <input type="text" pattern="[7-9]{1}[0-9]{9}" name="contact_no" id="contact_no" placeholder="Your Contact Number" required />
                                    </div>
                                    <div class="contact-form-email contact-form">
                                        <label>Your Email<span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" placeholder="Your Email" required />
                                    </div>
                                    <div class="contact-form-email contact-form">
                                        <label>Your Password<span class="text-danger">*</span></label>
                                        <input type="password" name="password" id="password" placeholder="Your Password" required />
                                    </div>
                                    <div class="contact-form-email contact-form">
                                        <label>Repeat Password<span class="text-danger">*</span></label>
                                        <input type="password" name="rpassword" id="rpassword" placeholder="Repeat Your Password" required onkeyup="matchPwd()" />
                                        <h6 class="text-danger mt-1" style="display: none;" id="rpwd">Those passwords didn’t match. Try again.</h6>
                                    </div>
                                    <?php if ($err != '') {
                                        echo '<h6 class="text-danger text-center alert-danger py-3">' . $err . '</h6><br>';
                                    } ?>
                                    <div class="btn-contact-form right">
                                        <button type="submit" name="submit" id="submitBtn" class="flat-button-form border-radius-2">REGISTER</button>
                                    </div>
                                    <h4 class="text-center mt-5"><a href="login.php">Already have an account?</a></h4>
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
    <script>
        function matchPwd() {
            $("#rpwd").hide();
            $("#submitBtn").prop('disabled', false);
            if ($("#password").val() != $("#rpassword").val()) {
                $("#rpwd").show();
                $("#submitBtn").prop('disabled', true);
            }
        }
    </script>
</body>

</html>