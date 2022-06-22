<?php
session_start();
include('admin/include/dbConnect.php');
include('admin/include/helper.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>

    <meta charset="UTF-8">
    <title>BELAERT</title>
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
        <div id="banner-container" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classic4export" data-source="gallery" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">

            <div id="banner-slide" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.3.0.2">
                <div class="slotholder"></div>
                <ul>
                    <li data-index="rs-3050" data-transition="slideremovedown" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000" data-rotate="0" data-saveperformance="off" data-title="Ken Burns" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">

                        <img src="images/slides/slide-02.jpg" alt="" data-bgposition="center center" data-kenburns="off" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>

                        <?php
                        if (isset($_SESSION['SESS_USER_TOKEN2']) && trim($_SESSION['SESS_USER_TOKEN2']) != '') {
                        ?>
                            <div class="tp-caption title-slide color-white letter-spacing3px text-uppercase" id="slide-3049-layer-1" data-x="['left','left','left','left']" data-hoffset="['35','35','35','35']" data-y="['middle','middle','middle','middle']" data-voffset="['-95','-90','-100','-90']" data-fontsize="['50','45','40','35']" data-lineheight="['72','64','50','40']" data-fontweight="['700','600','600','500']" data-width="['1000','800','600','400']" data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0" data-paddingleft="[0,0,0,0]" style="z-index: 16; white-space: nowrap;">
                                SEARCH HERE
                                <form action="results.php">
                                    <input type="url" name="s" class="form-control w-100 searchmal" placeholder="type here and hit enter" aria-label="type here and hit enter">
                                </form>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="tp-caption title-slide color-white letter-spacing3px text-uppercase" id="slide-3049-layer-1" data-x="['left','left','left','left']" data-hoffset="['35','35','35','35']" data-y="['middle','middle','middle','middle']" data-voffset="['-95','-90','-100','-90']" data-fontsize="['50','45','40','35']" data-lineheight="['72','64','50','40']" data-fontweight="['700','600','600','500']" data-width="['1000','800','600','400']" data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0" data-paddingleft="[0,0,0,0]" style="z-index: 16; white-space: nowrap;">
                                Free URL scanner to detect phishing & fraudulent sites
                            </div>

                            <div class="tp-caption sub-title color-white" id="slide-3049-layer-4" data-x="['left','left','left','left']" data-hoffset="['38','35','35','35']" data-y="['middle','middle','middle','middle']" data-voffset="['30','90','50','50']" data-fontsize="['18',18','16','14']" data-lineheight="['32','28','28','24']" data-fontweight="['500','400','400','400']" data-width="['800','700','500','400']" data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 17; white-space: nowrap;">
                                BELAERT is a free tool to detect malicious URLs including malware and phishing links. Safe link checker scan URLs for malware, viruses, and phishing links.
                            </div>
                            <a href="register.php" target="_self" class="tp-caption flat-button-slider bg-blue" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]' data-x="['left','left','left','left']" data-hoffset="['35','35','35','35']" data-y="['middle','middle','middle','middle']" data-voffset="['122','180','160','130']" data-fontsize="['14','14','14','14']" data-width="['auto']" data-height="['auto']">REGISTER NOW</a>
                            <a href="login.php" target="_self" class="tp-caption flat-button-slider bg-white" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]' data-x="['left','left','left','left']" data-hoffset="['235','225','225','225']" data-y="['middle','middle','middle','middle']" data-voffset="['122','180','160','130']" data-fontsize="['14',14','14','14']" data-width="['auto']" data-height="['auto']">LOGIN</a>
                        <?php
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
        <?php include("include/about.php") ?>
        <section class="flat-our-work style3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="top-title center">
                            <h2>HOW IT WORKS</h2>
                            <p>Bitcoin is received, stored, and sent using software known as a 'Bitcoin Wallet'</p>
                        </div>
                    </div>
                </div>
                <div class="row wrap-iconbox style2">
                    <div class="col-md-6">
                        <div class="iconbox center inline-right style6 v1 icon-one">
                            <div class="icon">
                                <span><img src="images/1.png" alt=""></span>
                                <div class="number  left">
                                    1
                                </div>
                            </div>
                            <div class="iconbox-content left">
                                <h4><a href="#" title="">CREAT ACCOUNT</a></h4>
                                <p>Your data is secure</p>
                            </div>
                        </div>
                        <div class="iconbox center inline-right style6 v1 icon-three">
                            <div class="icon">
                                <span><img src="images/2.png" alt=""></span>
                                <div class="number right">
                                    3
                                </div>
                            </div>
                            <div class="iconbox-content left">
                                <h4><a href="#" title="">RESULT</a></h4>
                                <p>We'll see if it's been reported for phishing, hosting malware/viruses, or poor reputation.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="iconbox center inline-left style6 v1 icon-two">
                            <div class="icon">
                                <span><img src="images/3.png" alt=""></span>
                                <div class="number center">
                                    2
                                </div>
                            </div>
                            <div class="iconbox-content left">
                                <h4 class="text-uppercase"><a href="#" title="">Enter a website URL</a></h4>
                                <p>We don't follow shortened or redirected URLs, and instead we report on the literal domain provided, just like any other domain name entered into our website.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include("include/expert.php") ?>
        <section class="flat-counter style3">
            <div class="container">
                <div class="wrap-counter">
                    <div class="row">
                        <div class="col-md-3 col-6">
                            <div class="square style3 center">
                                <div class="counter-box">
                                    <div class="icon">
                                        <i class="fa fa-flag" aria-hidden="true"></i>
                                    </div>
                                    <div class="numb-count" data-from="0" data-to="50" data-speed="2000" data-waypoint-active="yes">50</div>
                                    <div class="text color-default">
                                        PROJECTS
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="square style3 center">
                                <div class="counter-box">
                                    <div class="icon">
                                        <i class="fa fa-suitcase" aria-hidden="true"></i>
                                    </div>
                                    <div class="numb-count" data-from="0" data-to="70" data-speed="2000" data-waypoint-active="yes">70</div>
                                    <div class="text">
                                        CLIENTS
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="square style3 center">
                                <div class="counter-box">
                                    <div class="icon">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>
                                    <div class="numb-count" data-from="0" data-to="120" data-speed="2000" data-waypoint-active="yes">120</div>
                                    <div class="text">
                                        ACCOUNTS
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="square style3 center">
                                <div class="counter-box">
                                    <div class="icon">
                                        <i class="fa fa-link" aria-hidden="true"></i>
                                    </div>
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
        <?php include("include/consult.php") ?>
        <?php include("include/news.php") ?>
        <?php include("include/footer.php"); ?>
    </div>

    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script type="text/javascript" src="javascript/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/tether.min.js"></script>
    <script type="text/javascript" src="javascript/bootstrap.min.js"></script>
    <script type="text/javascript" src="javascript/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="javascript/owl.carousel.js"></script>
    <script type="text/javascript" src="javascript/jquery.easing.js"></script>
    <script type="text/javascript" src="javascript/jquery-countTo.js"></script>
    <script type="text/javascript" src="javascript/jquery.cookie.js"></script>
    <script type="text/javascript" src="javascript/waypoints.min.js"></script>
    <script type="text/javascript" src="javascript/main.js"></script>

    <script type="text/javascript" src="revolution/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="revolution/js/slider_v1.js"></script>

    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.video.min.js"></script>
</body>

<!-- Mirrored from themesflat.com/html/coinjet/index-02.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 May 2022 12:58:42 GMT -->

</html>