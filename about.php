<?php
session_start();
include('admin/include/dbConnect.php');
include('admin/include/helper.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>

    <meta charset="UTF-8">
    <title>About Us | BELAERT</title>
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
                                <h1 class="h1-title">ABOUT US</h1>
                            </div>
                            <ul class="breadcrumbs">
                                <li><a href="#" title="">Home</a></li>
                                <li class="dot">/</li>
                                <li>About</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("include/about.php") ?>
        <section class="flat-counter">
            <div class="container">
                <div class="wrap-counter">
                    <div class="row">
                        <div class="col-md-3 col-6">
                            <div class="square center">
                                <div class="counter-box">
                                    <div class="numb-count" data-from="0" data-to="50" data-speed="2000" data-waypoint-active="yes">50</div>
                                    <div class="text color-default">
                                        PROJECTS
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="square center">
                                <div class="counter-box">
                                    <div class="numb-count" data-from="0" data-to="70" data-speed="2000" data-waypoint-active="yes">70</div>
                                    <div class="text">
                                        CLIENTS
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="square center">
                                <div class="counter-box">
                                    <div class="numb-count" data-from="0" data-to="120" data-speed="2000" data-waypoint-active="yes">120</div>
                                    <div class="text">
                                        ACCOUNTS
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="square center">
                                <div class="counter-box">
                                    <div class="numb-count" data-from="0" data-to="220" data-speed="2000" data-waypoint-active="yes">220</div>
                                    <div class="text">
                                        TRANSACTIONS
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include("include/expert.php") ?>
        <?php include("include/consult.php") ?>
        <?php include("include/footer.php"); ?>
    </div>

    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script type="text/javascript" src="javascript/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/tether.min.js"></script>
    <script type="text/javascript" src="javascript/bootstrap.min.js"></script>
    <script type="text/javascript" src="javascript/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="javascript/owl.carousel.js"></script>
    <script type="text/javascript" src="javascript/jquery.easing.js"></script>
    <script type="text/javascript" src="javascript/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="javascript/jquery-countTo.js"></script>
    <script type="text/javascript" src="javascript/jquery.cookie.js"></script>
    <script type="text/javascript" src="javascript/waypoints.min.js"></script>
    <script type="text/javascript" src="javascript/main.js"></script>

</body>
</html>