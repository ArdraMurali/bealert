<?php
include('include/auth.php');
include('admin/include/dbConnect.php');
include('admin/include/helper.php');
$title = 'SEARCH RESULTS';
if (isset($_GET['s']) && trim($_GET['s']) != '') {
    $s = trim($_GET['s']);
} else {
    header("location: ../");
}

$stmt = $db->prepare("INSERT INTO search(token, keyword, created_at) VALUES (?, ?, ?)");
$stmt->bindParam(1, $user);
$stmt->bindParam(2, $s);
$stmt->bindParam(3, $current_date_time_local);
$stmt->execute();

$domain = parse_url($s);
$s2 = $domain['host'];

$s3 = substr($s2, 0, strpos($s2, "."));
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>

    <meta charset="UTF-8">
    <title><?php echo $title ?> | BELAERT</title>
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
                                <h1 class="h1-title"><?php echo $title ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="main-content ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Search results for "<?php echo $s ?>"</h4>
                        <div class="blog-pagination mt-3"></div>
                    </div>
                    <?php
                    $qry = $db->prepare("SELECT * FROM malicious_websites WHERE link = '$s' AND status = 1");
                    $qry->execute();
                    if ($qry->rowcount() == 0) {
                    ?>
                        <div class="col-md-6 offset-md-3">
                            <img src="images/mt.webp" class="w-100">
                        </div>
                        <?php
                    } else {
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
                                    </ul>
                                </article>
                            </div>
                    <?php }
                    } ?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Search results for "<?php echo $s2 ?>"</h4>
                        <div class="blog-pagination mt-3"></div>
                    </div>
                    <?php
                    $qry = $db->prepare("SELECT * FROM malicious_websites WHERE link LIKE '%$s2%' AND status = 1");
                    $qry->execute();
                    if ($qry->rowcount() == 0) {
                    ?>
                        <div class="col-md-6 offset-md-3">
                            <img src="images/mt.webp" class="w-100">
                        </div>
                        <?php
                    } else {
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
                                    </ul>
                                </article>
                            </div>
                    <?php }
                    } ?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Search results for "<?php echo $s3 ?>"</h4>
                        <div class="blog-pagination mt-3"></div>
                    </div>
                    <?php
                    $qry = $db->prepare("SELECT * FROM malicious_websites WHERE link LIKE '%$s3%' OR tags LIKE '%$s3%' OR description LIKE '%$s3%' OR technical LIKE '%$s3%' AND status = 1");
                    $qry->execute();
                    if ($qry->rowcount() == 0) {
                    ?>
                        <div class="col-md-6 offset-md-3">
                            <img src="images/mt.webp" class="w-100">
                        </div>
                        <?php
                    } else {
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
                                    </ul>
                                </article>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>
        </section>
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