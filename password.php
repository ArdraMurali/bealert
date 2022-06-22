<?php
include('include/auth.php');
include('admin/include/dbConnect.php');
include('admin/include/helper.php');
$err = '';
$token = $user;

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
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>

    <meta charset="UTF-8">
    <title>UPDATE PASSWORD | BELAERT</title>
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
                                <h1 class="h1-title">UPDATE PASSWORD</h1>
                            </div>
                            <ul class="breadcrumbs">
                                <li><a href="profile.php" title="">PROFILE</a></li>
                                <li class="dot">/</li>
                                <li>UPDATE PASSWORD</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="flat-row flat-contact-form mt-0 pt-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3 col-sm-10 offset-sm-1">
                        <div class="form-contact-form">
                            <a href="profile.php" class="btn btn-success float-left flat-button-form border-radius-2 mb-5">go back</a>
                            <div class="clearfix"></div>
                            <form action="password.php" method="post" accept-charset="utf-8" autocomplete="off">
                                <div id="subscribe-content-1">
                                    <div class="form-group mt-3">
                                        <label class="form-control-placeholder">Current password</label>
                                        <input type="password" name="cPassword" class="form-control" placeholder="Enter current password" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label class="form-control-placeholder">New password</label>
                                        <input type="password" name="nPassword" class="form-control" placeholder="Enter new password" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label class="form-control-placeholder">Repeat new password</label>
                                        <input type="password" name="rPassword" class="form-control" placeholder="Re-enter new password" required>
                                    </div>
                                    <?php if ($err != '') {
                                        echo '<h6 class="text-danger text-center alert-danger py-3">' . $err . '</h6><br>';
                                    } ?>
                                    <div class="btn-contact-form">
                                        <button type="submit" name="submit" class="flat-button-form border-radius-2 float-right">UPDATE PASSWORD</button>
                                    </div>
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