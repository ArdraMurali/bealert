<?php
$qrySearch = $db->prepare("SELECT * FROM search");
$qrySearch->execute();
$searchCount = $qrySearch->rowcount();

$qrySearch = $db->prepare("SELECT * FROM malicious_websites");
$qrySearch->execute();
$webCount = $qrySearch->rowcount();

$qrySearch = $db->prepare("SELECT * FROM comments");
$qrySearch->execute();
$commentCount = $qrySearch->rowcount();

$qrySearch = $db->prepare("SELECT * FROM users WHERE user_type = 'user'");
$qrySearch->execute();
$userCount = $qrySearch->rowcount();
?>
<div class="row">
    <div href="malicious-websites.php" class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="dash-widget dash-widget5">
            <div class="dash-widget-info text-left d-inline-block">
                <span class="text-uppercase">malicious websites</span>
                <h3><?php echo $webCount ?></h3>
            </div>
            <span class="float-right"><img src="assets/img/dash2/mal.png" width="80" alt=""></span>
        </div>
    </div>
    <div href="malicious-websites.php" class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="dash-widget dash-widget5">
            <div class="dash-widget-info text-left d-inline-block">
                <span class="text-uppercase">Searches</span>
                <h3><?php echo $searchCount ?></h3>
            </div>
            <span class="float-right"><img src="assets/img/dash2/rsearch.png" width="80" alt=""></span>
        </div>
    </div>
    <div href="malicious-websites.php" class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="dash-widget dash-widget5">
            <div class="dash-widget-info text-left d-inline-block">
                <span class="text-uppercase">Users</span>
                <h3><?php echo $userCount ?></h3>
            </div>
            <span class="float-right"><img src="assets/img/dash2/users.png" width="80" alt=""></span>
        </div>
    </div>
    <div href="malicious-websites.php" class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="dash-widget dash-widget5">
            <div class="dash-widget-info d-inline-block text-left">
                <span class="text-uppercase">Comments</span>
                <h3><?php echo $commentCount ?></h3>
            </div>
            <span class="float-right"><img src="assets/img/dash2/comments.png" alt="" width="80"></span>
        </div>
    </div>
</div>