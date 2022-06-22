<?php
include('include/auth.php');
include('include/dbConnect.php');
include('include/helper.php');
$title = 'FEEDBACK';
$created_by = $user;
$token = $_GET['token'];
$qry = $db->prepare("SELECT * FROM feedbacks WHERE token = '$token'");
$qry->execute();
$rows = $qry->fetch();

$qryIn = $db->prepare("SELECT * FROM users WHERE token = '" . $rows['created_by'] . "'");
$qryIn->execute();
$rowsIn = $qryIn->fetch();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $title ?> | BELAERT ADMIN PANEL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">

    <link rel="stylesheet" href="assets/css/fullcalendar.min.css">

    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/plugins/morris/morris.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/plugins/DataTables-1.12.1/css/bootstrap.css">
    <link rel="stylesheet" href="assets/plugins/DataTables-1.12.1/css/dataTables.bootstrap4.min.css">

    <script src="assets/js/jquery-3.6.0.min.js"></script>
</head>

<body>

    <div class="main-wrapper">


        <?php include("include/sidebar.php"); ?>


        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <form action="actions/feedback-reply.php" method="post" autocomplete="off" enctype="multipart/form-data">
                                    <input type="hidden" name="token" value="<?php echo $token ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-uppercase">SENT BY</label>
                                                <h4><?php echo ucwords($rowsIn['name']) ?> | <?php echo ($rowsIn['email']) ?> | <?php echo ($rowsIn['contact_no']) ?></h4>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="text-uppercase">SUBJECT</label>
                                                <h4><?php echo $rows['subject'] ?></h4>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="text-uppercase">FEEDBACK</label>
                                                <h4><?php echo $rows['feedback'] ?></h4>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="text-uppercase">Reply<span class="text-danger">*</span></label>
                                                <textarea class="form-control form-control-lg" rows="10" style="resize: none;" placeholder="" name="reply" required><?php echo $rows['reply'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2 pt-3 border-top text-center">
                                            <div class="btn-group">
                                                <a href="feedback.php" class="btn btn-danger btn-lg">GO BACK</a>
                                                <input type="reset" value="RESET" class="btn btn-warning btn-lg">
                                                <input type="submit" value="SEND REPLY" class="btn btn-success btn-lg">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/fullcalendar.min.js"></script>
    <script src="assets/js/jquery.fullcalendar.js"></script>
    <script src="assets/plugins/morris/morris.min.js"></script>
    <script src="assets/plugins/raphael/raphael-min.js"></script>
    <script src="assets/js/apexcharts.js"></script>
    <script src="assets/js/chart-data.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/plugins/DataTables-1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/DataTables-1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>