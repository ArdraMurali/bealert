<?php
include('include/auth.php');
include('admin/include/dbConnect.php');
include('admin/include/helper.php');
$qrySearch = $db->prepare("SELECT * FROM malicious_websites WHERE created_by = '$user'");
$qrySearch->execute();
$reportCount = $qrySearch->rowcount();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="UTF-8">
    <title>REPORTED LINKS | BELAERT</title>
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
                                <h1 class="h1-title">REPORTED LINKS</h1>
                            </div>
                            <ul class="breadcrumbs">
                                <li><a href="profile.php" title="">PROFILE</a></li>
                                <li class="dot">/</li>
                                <li>REPORTED LINKS</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="flat-row flat-contact-form">
            <div class="container">
                <div class="col-12 p-0">
                    <button class="btn btn-primary rounded-0" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        REPORT A LINK
                    </button>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body rounded-0 bg-primary border-0">
                            <div class="col-12">
                                <div class="form-contact-form">
                                    <form action="actions/report.php" method="post" accept-charset="utf-8" autocomplete="off" enctype="multipart/form-data">
                                        <div id="subscribe-content-1">
                                            <div class="form-group mt-3">
                                                <label class="text-white text-uppercase">MALICIOUS WEBSITES LINK/URL<span class="text-danger">*</span></label>
                                                <input type="url" class="form-control form-control-lg" name="link" required>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label class="text-white text-uppercase">TAGS<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control form-control-lg" placeholder="comma (,) separated tags" name="tags" required>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label class="text-white text-uppercase">Description<span class="text-danger">*</span></label>
                                                <textarea class="form-control form-control-lg" rows="4" style="resize: none;" placeholder="" name="description" required></textarea>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label class="text-white text-uppercase">Technical Details<span class="text-danger">*</span></label>
                                                <textarea class="form-control form-control-lg" rows="10" style="resize: none;" placeholder="" name="technical" required></textarea>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label class="text-white text-uppercase">IMAGE/SCREENSHOT<span class="text-danger">*</span></label>
                                                <input type="file" class="form-control form-control-lg" name="image" required>
                                            </div>
                                            <div class="right">
                                                <button type="submit" name="submit" class="flat-button-form border-radius-2 mb-3">SUBMIT</button>
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
                    <h2 class="text-white center">REPORTED LINKS (<?php echo $reportCount ?>)</h2>
                </div>
                <div class="col-12 mt-5">
                <?php
                    $qry = $db->prepare("SELECT * FROM malicious_websites WHERE created_by = '$user'");
                    $qry->execute();
                    for ($i = 0; $rows = $qry->fetch(); $i++) {
                        $qry2 = $db->prepare("SELECT * FROM comments WHERE token = '" . $rows['token'] . "'");
                        $qry2->execute();
                        $comments = $qry2->rowcount();
                    ?>
                        <div class="col-md-6">
                            <article class="main-post two-column">
                                <div class="featured-post">
                                    <a href="details.php?token=<?php echo $rows['token'] ?>" title="" class="d-block" style="height: 300px;overflow:hidden">
                                        <img src="files/<?php echo $rows['image'] ?>" alt="" />
                                    </a>
                                </div>
                                <div class="entry-content">
                                    <h2>
                                        <a href="details.php?token=<?php echo $rows['token'] ?>" title=""><?php echo $rows['link'] ?></a>
                                    </h2>
                                    <p>
                                        <?php echo $rows['description'] ?>
                                    </p>
                                </div>
                                <ul class="meta-left">
                                    <li class="post-date">
                                        <i class="fa fa-calendar"></i> <?php echo date_convert($rows['created_at']) ?>
                                    </li>
                                    <li class="post-view">
                                        <i class="fa fa-eye"></i> <?php echo $rows['views'] ?>
                                    </li>
                                    <li class="post-comment">
                                        <i class="fa fa-comment"></i> <?php echo $comments ?>
                                    </li>
                                    <li class="post-comment">
                                        <?php if($rows['status'] == 1){ ?>
                                        <span class="bg-success px-3 py-1 text-white">ACTIVE</span>
                                        <?php } else { ?>
                                        <span class="bg-danger px-3 py-1 text-white">BLOCKED</span>
                                        <?php } ?>
                                    </li>
                                </ul>
                                <?php if($rows['approved'] == 0){ ?>
                                    <span class="btn btn-danger btn-block btn-lg mt-4 rounded-0">APPROVAL PENDING</span>
                                <?php } ?>
                                <?php if($rows['approved'] == 1){ ?>
                                    <span class="btn btn-success btn-block btn-lg mt-4 rounded-0">APPROVED</span>
                                <?php } ?>
                            </article>
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