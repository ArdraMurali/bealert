<?php
include('include/auth.php');
include('admin/include/dbConnect.php');
include('admin/include/helper.php');
$title = 'SEARCH RESULTS';
if (isset($_GET['token']) && trim($_GET['token']) != '') {
    $token = trim($_GET['token']);
} else {
    header("location: ../");
}
$db->prepare("UPDATE malicious_websites SET views = views + 1 WHERE token = '$token'")->execute();

$qry = $db->prepare("SELECT * FROM malicious_websites WHERE token = '$token'");
$qry->execute();
$rows = $qry->fetch();
$title = $rows['link'];

$allow = 0;
if ($rows['status'] == 1) {
    $allow = 1;
}
if ($rows['created_by'] == $user) {
    $allow = 1;
}

$qry2 = $db->prepare("SELECT * FROM comments WHERE token = '$token'");
$qry2->execute();
$comments = $qry2->rowcount();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>

    <meta charset="UTF-8">
    <title>RESULT for <?php echo $title ?> | BELAERT</title>
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
        <section class="main-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php if ($allow == 1) { ?>
                            <article class="main-post main-single">
                                <div class="featured-post">
                                    <div class="col-12 p-0 rounded" style="max-height: 500px;overflow:auto">
                                        <img src="../files/<?php echo $rows['image'] ?>" class="w-100 rounded">
                                    </div>
                                </div>
                                <div class="entry-title">
                                    <h2>
                                        <?php echo $rows['link'] ?>
                                    </h2>
                                    <ul class="meta-left">
                                        <li class="post-date">
                                            <i class="fa fa-calendar"></i> <?php echo date_convert($rows['created_at']) ?>
                                        </li>
                                        <li class="post-view">
                                            <i class="fa fa-eye"></i> <?php echo $rows['views']; ?>
                                        </li>
                                        <li class="post-comment">
                                            <i class="fa fa-comment"></i> <?php echo $comments ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="entry-content">
                                    <p>
                                        <?php echo $rows['description']; ?>
                                    </p>
                                    <blockquote>
                                        <p>
                                            TECHNICAL DETAILS
                                        </p>
                                    </blockquote>
                                    <p>
                                        <?php echo nl2br($rows['technical']); ?>
                                    </p>
                                </div>
                                <div class="direction">
                                    <div class="widget_tag_cloud">
                                        <div class="tag-cloud">
                                            <?php
                                            $ddd = $rows['tags'];
                                            $pieces = explode(",", $ddd);
                                            if (isset($pieces[0])) {
                                                echo '<a href="#" title="" class="tag-link">' . strtoupper($pieces[0]) . '</a>';
                                            }
                                            if (isset($pieces[1])) {
                                                echo '<a href="#" title="" class="tag-link">' . strtoupper($pieces[1]) . '</a>';
                                            }
                                            if (isset($pieces[2])) {
                                                echo '<a href="#" title="" class="tag-link">' . strtoupper($pieces[2]) . '</a>';
                                            }
                                            if (isset($pieces[3])) {
                                                echo '<a href="#" title="" class="tag-link">' . strtoupper($pieces[3]) . '</a>';
                                            }
                                            if (isset($pieces[4])) {
                                                echo '<a href="#" title="" class="tag-link">' . strtoupper($pieces[4]) . '</a>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </article>
                            <div class="comment-single">
                                <div class="comment-area">
                                    <h3><?php echo $comments ?> Comments</h3>
                                    <ol class="comment-list">
                                        <?php
                                        for ($i2 = 0; $rowsC = $qry2->fetch(); $i2++) {
                                            $qryUser = $db->prepare("SELECT * FROM users WHERE token = '" . $rowsC['created_by'] . "'");
                                            $qryUser->execute();
                                            $rowsUser = $qryUser->fetch();
                                        ?>
                                            <li class="comment">
                                                <article class="comment-body">
                                                    <div class="comment-text">
                                                        <div class="comment-metadata">
                                                            <div class="name">
                                                                <?php echo ucwords($rowsUser['name']) ?> <span class="date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date_convert($rowsC['created_at']) ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="comment-content">
                                                            <p><?php echo $rowsC['comment'] ?></p>
                                                        </div>
                                                    </div>
                                                </article>
                                            </li>
                                        <?php } ?>
                                    </ol>
                                </div>
                                <?php
                                $qry2 = $db->prepare("SELECT * FROM comments WHERE token = '$token' AND created_by = '$user'");
                                $qry2->execute();
                                if ($qry2->rowcount() == 0) {
                                ?>
                                    <div class="comment-respond">
                                        <h2>Hi <?php echo ucwords($_SESSION['SESS_USER_NAME2']) ?>, Leave your comment</h2>
                                        <form action="actions/comment.php" method="post" accept-charset="utf-8">
                                            <input type="hidden" name="token" value="<?php echo $token ?>">
                                            <div class="comment-form-comment">
                                                <textarea placeholder="Your Message" required style="resize: none;" name="comment"></textarea>
                                            </div>
                                            <div class="comment-form-submit right">
                                                <button type="submit">SEND COMMENT</button>
                                            </div>
                                        </form>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } else { ?>
                            <div class="wrap-error center">
                                <header class="page-header">
                                    <h1 class="title-404 nothing">404</h1>
                                    <div class="sub-title-404">
                                        <p>Oops! This Page is Not Found</p>
                                        <p>Please go back to <a href="../" title=""><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Home</a> and try to find out once </p>
                                    </div>
                                </header>
                            </div>
                        <?php } ?>
                    </div>
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