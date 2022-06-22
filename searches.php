<?php
include('include/auth.php');
include('admin/include/dbConnect.php');
include('admin/include/helper.php');
$qrySearch = $db->prepare("SELECT * FROM search WHERE token = '$user'");
$qrySearch->execute();
$searchCount = $qrySearch->rowcount();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="UTF-8">
    <title>RECENT SEARCHES | BELAERT</title>
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
                                <h1 class="h1-title">RECENT SEARCHES</h1>
                            </div>
                            <ul class="breadcrumbs">
                                <li><a href="profile.php" title="">PROFILE</a></li>
                                <li class="dot">/</li>
                                <li>RECENT SEARCHES</li>
                            </ul>
                            <form action="results.php">
                                <input type="url" name="s" class="form-control w-100 searchmal" placeholder="type here and hit enter" aria-label="type here and hit enter">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="flat-row flat-contact-form">
            <div class="container">
                <div class="col-12">
                    <h2 class="mb-5 text-dark-p6"><?php echo $searchCount ?> SEARCHES</h2>
                    <div class="clearfix"></div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Search Link</th>
                                    <th>Dated</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qry = $db->prepare("SELECT * FROM search WHERE token = '$user' ORDER BY id DESC LIMIT 50");
                                $qry->execute();
                                for ($i = 0; $rows = $qry->fetch(); $i++) {
                                ?>
                                    <tr>
                                        <td><?php echo $rows['keyword'] ?></td>
                                        <td><?php echo time_convert($rows['created_at']) ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="results.php?s=<?php echo $rows['keyword'] ?>" target="_blank" class="btn btn-warning btn-sm">SEARCH AGAIN</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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