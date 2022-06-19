<?php
session_start();
include('admin/include/dbConnect.php');
include('admin/include/helper.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>

    <meta charset="UTF-8">
    <title>Contact Us | BELAERT</title>
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
                                <h1 class="h1-title">CONTACT US</h1>
                            </div>
                            <ul class="breadcrumbs">
                                <li><a href="#" title="">Home</a></li>
                                <li class="dot">/</li>
                                <li>Contact us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="flat-address-box">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="address-box center">
                            <div class="box-header">
                                <div class="icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                            </div>
                            <div class="box-content">
                                <h2>Address</h2>
                                <p>291 Proin Road, Lake Charles, Maine 11292</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="address-box center">
                            <div class="box-header">
                                <div class="icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                            </div>
                            <div class="box-content">
                                <h2>Phone number</h2>
                                <p>+1 234 800 8080</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="address-box center">
                            <div class="box-header">
                                <div class="icon">
                                    <i class="fa fa-envelope-open"></i>
                                </div>
                            </div>
                            <div class="box-content">
                                <h2>Email:</h2>
                                <p><a href="#" class="__cf_email__">support@bealert.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="flat-map">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <section class="pdmap" id="flat-map">
                            <div class="flat-maps" data-address="383 Fourth Street, Old Town, ME 04468, Hoa Kỳ" data-height="500" data-image="images/icon/map.png" data-name="Themesflat Map"></div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.42235459804!2d76.42440681532527!3d10.778928362093698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba7d92a2b80911f%3A0x1d1cfbcdba4de166!2sEwolwe!5e0!3m2!1sen!2sin!4v1653585902495!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </section>
                    </div>
                </div>
            </div>
        </section>
        <section class="flat-row flat-contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="top-title center">
                            <h2>CONTACT WITH US</h2>
                            <p>We'll help you resolve your issues quickly and easily.</p>
                        </div>
                        <div class="form-contact-form">
                            <form id="contactform" action="https://themesflat.com/html/coinjet/contact/contact-process.php" method="post" accept-charset="utf-8">
                                <div id="subscribe-content-1">
                                    <div class="field-row">
                                        <div class="contact-form-name contact-form">
                                            <input type="text" name="name" id="name" placeholder="Your Name" required="" />
                                        </div>
                                        <div class="contact-form-email contact-form">
                                            <input type="text" name="email" id="email" placeholder="Your Email" required="" />
                                        </div>
                                    </div>
                                    <div class="contact-form-comment contact-form">
                                        <textarea name="message" id="message" placeholder="Your Message" required=""></textarea>
                                    </div>
                                    <div class="btn-contact-form center">
                                        <button type="submit" class="flat-button-form border-radius-2">SEND MESSAGE</button>
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

    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script type="text/javascript" src="javascript/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/tether.min.js"></script>
    <script type="text/javascript" src="javascript/bootstrap.min.js"></script>
    <script type="text/javascript" src="javascript/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="javascript/owl.carousel.js"></script>
    <script type="text/javascript" src="javascript/jquery.easing.js"></script>
    <script type="text/javascript" src="javascript/jquery-validate.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtwK1Hd3iMGyF6ffJSRK7I_STNEXxPdcQ&amp;region=GB"></script>
    <script type="text/javascript" src="javascript/gmap3.min.js"></script>
    <script type="text/javascript" src="javascript/jquery.cookie.js"></script>
    <script type="text/javascript" src="javascript/waypoints.min.js"></script>
    <script type="text/javascript" src="javascript/main.js"></script>

</body>
</html>