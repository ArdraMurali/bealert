<?php
include('include/auth.php');
include('admin/include/dbConnect.php');
include('admin/include/helper.php');
$qrySearch = $db->prepare("SELECT * FROM search WHERE token = '$user'");
$qrySearch->execute();
$searchCount = $qrySearch->rowcount();

$qrySearch = $db->prepare("SELECT * FROM malicious_websites WHERE created_by = '$user'");
$qrySearch->execute();
$reportCount = $qrySearch->rowcount();

$qrySearch = $db->prepare("SELECT * FROM comments WHERE created_by = '$user'");
$qrySearch->execute();
$commentCount = $qrySearch->rowcount();

$qrySearch = $db->prepare("SELECT * FROM users WHERE token = '$user'");
$qrySearch->execute();
$rowsUser = $qrySearch->fetch();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>

    <meta charset="UTF-8">
    <title>PROFILE | BELAERT</title>
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
        .profile-head {
            transform: translateY(5rem)
        }

        .cover {
            background-image: url('../images/parallax/page-title.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            border-radius: 4px 4px 0 0;
        }

        body {
            background: #e96443;
            background: linear-gradient(to right, #e96443, #904e95);
            /* min-height: 100vh; */
            /* overflow-x: hidden; */
        }
    </style>
</head>

<body>
    <div class="boxed blog">
        <?php include("include/header.php"); ?>
        <section class="flat-row flat-contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                        <div class="bg-white shadow rounded">
                            <div class="px-4 pt-0 pb-4 cover">
                                <div class="media align-items-end profile-head">
                                    <div class="profile mr-3">
                                        <img src="images/avatar.jpg" alt="..." width="130" class="rounded-circle mb-2 img-thumbnail">
                                    </div>
                                    <div class="media-body mb-5 text-white">
                                        <h4 class="mt-0 mb-0 text-white w-100"><?php echo strtoupper($_SESSION['SESS_USER_NAME2']) ?></h4>
                                        <p class="small mb-4 w-100"><?php echo strtolower($_SESSION['SESS_USER_EMAIL2']) ?> | <?php echo strtolower($_SESSION['SESS_USER_CONTACT2']) ?></p>
                                    </div>
                                </div>
                            </div>
                            <section class="py-4 px-2">
                                <div class="container">
                                    <h3 class="text-center mb-3">ACTIONS</h3>
                                    <div class="btn-group w-100 rounded-0">
                                        <a href="../searches.php" title="click to goto search history" class="btn btn-danger py-3 w-50 float-left rounded-0">
                                            <h1 class="text-white"><?php echo $searchCount ?></h1>
                                            <h3 class="text-white">SEARCHES</h3>
                                        </a>
                                        <a href="../report.php" title="click to report a malicious link" class="btn btn-primary py-3 w-50 float-left rounded-0">
                                            <h1 class="text-white"><?php echo $reportCount ?></h1>
                                            <h3 class="text-white">REPORTS</h3>
                                        </a>
                                    </div>
                                    <div class="btn-group w-100 rounded-0">
                                        <a href="../comments.php" title="click to view commented links" class="btn btn-success py-3 w-50 float-left rounded-0">
                                            <h1 class="text-white"><?php echo $commentCount ?></h1>
                                            <h3 class="text-white">COMMENTS</h3>
                                        </a>
                                        <a href="../feedback.php" title="click to view commented links" class="btn btn-warning py-3 w-50 float-left rounded-0">
                                            <h1 class="text-white"><?php echo $commentCount ?></h1>
                                            <h3 class="text-white">FEEDBACKS</h3>
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>
                                    <a href="../password.php" title="click to view commented links" style="background-color: #212121;" class="btn py-3 w-50 float-left rounded-0">
                                        <h3 class="text-white">UPDATE PASSWORD</h3>
                                    </a>
                                    <a href="../logout.php" title="click to view commented links" class="btn btn-danger py-3 w-50 float-left rounded-0">
                                        <h3 class="text-white">LOGOUT</h3>
                                    </a>
                                    <div class="clearfix"></div>
                                    <h6 class="text-uppercase text-center mt-5">SINCE <?php echo date_convert($rowsUser['created_at']) ?></h6>
                                </div>
                            </section>
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