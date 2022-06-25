<?php
include('include/auth.php');
include('include/dbConnect.php');
include('include/helper.php');
$title = 'FEEDBACKS';
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
                <?php include("include/dash.php"); ?>
                <div class="row">
                    <div class="col-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>By</th>
                                            <th>Feedback</th>
                                            <th>Reply</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $qry = $db->prepare("SELECT * FROM feedbacks ORDER BY id DESC");
                                        $qry->execute();
                                        for ($i = 0; $rows = $qry->fetch(); $i++) {

                                            $qryIn = $db->prepare("SELECT * FROM users WHERE token = '" . $rows['created_by'] . "'");
                                            $qryIn->execute();
                                            $rowsIn = $qryIn->fetch();
                                        ?>
                                            <tr>
                                                <td>
                                                    <span style="font-weight:bold"> <?php echo ucwords($rowsIn['name']) ?></span><br>
                                                    <?php echo ($rowsIn['email']) ?><br>
                                                    <?php echo ($rowsIn['contact_no']) ?>
                                                </td>
                                                <td>
                                                    <?php echo time_convert($rows['created_at']) ?><br>
                                                    Subject: <?php echo $rows['subject'] ?><br>
                                                    <span style="font-weight:bold"><?php echo $rows['feedback'] ?></span>
                                                </td>
                                                <td style="vertical-align:bottom"><?php if ($rows['reply'] != '') {
                                                        echo $rows['reply'];
                                                    ?>
                                                        <br><a href="feedback-reply.php?token=<?php echo $rows['token']; ?>" class="btn btn-primary btn-sm float-right mt-2">VIEW</a>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <a href="feedback-reply.php?token=<?php echo $rows['token']; ?>" class="btn btn-primary btn-sm float-right mt-2">REPLY</a>
                                                    <?php
                                                    } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>By</th>
                                            <th>Feedback</th>
                                            <th>Reply</th>
                                        </tr>
                                    </tfoot>
                                </table>
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
