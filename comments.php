<?php
include('include/auth.php');
include('admin/include/dbConnect.php');
include('admin/include/helper.php');
$qrySearch = $db->prepare("SELECT * FROM comments WHERE created_by = '$user'");
$qrySearch->execute();
$commentCount = $qrySearch->rowcount();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="UTF-8">
    <title>COMMENTS | BELAERT</title>
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
                                <h1 class="h1-title">COMMENTS</h1>
                            </div>
                            <ul class="breadcrumbs">
                                <li><a href="profile.php" title="">PROFILE</a></li>
                                <li class="dot">/</li>
                                <li>COMMENTS</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="flat-row flat-contact-form">
            <div class="container">
                <div class="col-12">
                    <h2 class="mb-5 text-dark-p6"><?php echo $commentCount ?> COMMENTS</h2>
                    <div class="clearfix"></div>
                    <div class="accordion">
                        <?php
                        $qry = $db->prepare("SELECT * FROM comments WHERE created_by = '$user' ORDER BY id DESC");
                        $qry->execute();
                        if ($qry->rowCount() > 0) {
                            for ($i = 0; $rows = $qry->fetch(); $i++) {
                                $qryIn = $db->prepare("SELECT * FROM malicious_websites WHERE token = '" . $rows['token'] . "'");
                                $qryIn->execute();
                                $rowsIn = $qryIn->fetch();
                        ?>
                                <div class="accordion-toggle pt-2 pb-4 shadow-c3">
                                    <div class="toggle-title text-bolder active">
                                        <h3 class="pt-4 pr-3">
                                            <?php echo $rowsIn['link'] ?>
                                        </h3>
                                        <p class="small"><?php echo time_convert($rows['created_at']) ?></p>
                                    </div>
                                    <div class="toggle-content pr-4">
                                        <p>
                                            <?php echo ucfirst($rows['comment']) ?>
                                        </p>
                                        <div class="clearfix"></div>
                                        <div class="col-12 text-right mt-5">
                                            <a href="details.php?token=<?php echo $rows['token'] ?>" target="_blank" class="btn btn-primary btn-sm rounded-0">VIEW</a>
                                            <a href="actions/comment-delete.php?token=<?php echo $rows['token'] ?>" class="btn btn-danger btn-sm rounded-0">DELETE</a>
                                        </div>
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