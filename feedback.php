<?php
include('include/auth.php');
include('admin/include/dbConnect.php');
include('admin/include/helper.php');
$qry = $db->prepare("SELECT * FROM feedbacks WHERE created_by = '$user'");
$qry->execute();
$feedbackCount = $qry->rowCount();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="UTF-8">
    <title>FEEDBACKS | BELAERT</title>
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
    <script type="text/javascript" src="javascript/jquery.min.js"></script>
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
                                <h1 class="h1-title">FEEDBACKS</h1>
                            </div>
                            <ul class="breadcrumbs">
                                <li><a href="profile.php" title="">PROFILE</a></li>
                                <li class="dot">/</li>
                                <li>FEEDBACKS</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="flat-row flat-contact-form">
            <div class="container">
                <div class="col-md-6 p-0">
                    <button class="btn btn-primary rounded-0" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        SEND FEEDBACK
                    </button>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body rounded-0 bg-primary border-0">
                            <div class="col-12">
                                <div class="form-contact-form">
                                    <form action="actions/feedback.php" method="post" accept-charset="utf-8" autocomplete="off">
                                        <div id="subscribe-content-1">
                                            <div class="form-group mt-3">
                                                <label class="text-white">Subject</label>
                                                <input type="text" name="subject" class="form-control" placeholder="" required>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label class="text-white">Your Feedback</label>
                                                <textarea class="form-control" name="feedback" placeholder="" rows="6" style="resize: none;" required></textarea>
                                            </div>
                                            <div class="right">
                                                <button type="submit" name="submit" class="flat-button-form border-radius-2 mb-3">SEND FEEDBACK</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-12 bg-primary p-3 mt-3">
                    <h2 class="text-white center">FEEDBACKS (<?php echo $feedbackCount ?>)</h2>
                </div>
                <div class="col-12 mt-5">
                    <div class="accordion">
                        <?php
                        $qry = $db->prepare("SELECT * FROM feedbacks WHERE created_by = '$user' ORDER BY id DESC");
                        $qry->execute();
                        if ($qry->rowCount() > 0) {
                            for ($i = 0; $rows = $qry->fetch(); $i++) {
                        ?>
                                <div class="accordion-toggle pt-2 pb-4 shadow-c3">
                                    <div class="toggle-title text-bolder active">
                                        <h3 class="pt-4 pr-3">
                                            <?php echo ucfirst($rows['subject']) ?>
                                        </h3>
                                        <p class="small"><?php echo time_convert($rows['created_at']) ?></p>
                                    </div>
                                    <div class="toggle-content pr-3">
                                        <p>
                                            <?php echo ucfirst($rows['feedback']) ?>
                                        </p>
                                        <div class="clearfix"></div>
                                        <?php if ($rows['reply'] != '') { ?>
                                            <h3 class="mt-3 mb-1">REPLY BY ADMIN</h3>
                                            <p>
                                                <?php echo ucfirst($rows['reply']) ?>
                                            </p>
                                        <?php } ?>
                                        <a href="actions/feedback-delete.php?token=<?php echo $rows['token'] ?>" class="btn btn-danger rounded-0 float-right mt-5">DELETE</a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            <?php }
                        } else { ?>
                            <div class="col-md-6 offset-md-3">
                                <img src="images/mt.webp" class="w-100">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <?php include("include/footer.php"); ?>
    </div>
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