<?php
include('include/auth.php');
include('include/dbConnect.php');
include('include/helper.php');
$title = 'MALICIOUS WEBSITES';
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
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <a href="malicious-websites-reported.php" class="btn btn-primary text-uppercase">Reported websites</a>
                                        <a href="malicious-websites-create.php" class="btn btn-success">ADD NEW</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Link</th>
                                            <th>Shor Description</th>
                                            <th>Created At</th>
                                            <th>Tags</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        echo $user;
                                        $qry = $db->prepare("SELECT * FROM malicious_websites WHERE created_by = '$user'");
                                        $qry->execute();
                                        for ($i = 0; $rows = $qry->fetch(); $i++) {
                                        ?>
                                            <tr>
                                                <td><a href="<?php echo $rows['link'] ?>" target="_blank"><?php echo $rows['link'] ?></a></td>
                                                <td><?php echo $rows['description'] ?></td>
                                                <td><?php echo time_convert($rows['created_at']) ?></td>
                                                <td><?php echo $rows['tags'] ?></td>
                                                <td>
                                                    <?php if ($rows['status'] == 1) {
                                                        echo '<span class="btn btn-success btn-sm">ACTIVE</span>';
                                                        $status = '<a href="actions/malicious-websites-status.php?token='.$rows['token'].'&status=0" class="btn btn-danger btn-sm">BLOCK</a>';
                                                    } else {
                                                        echo '<span class="btn btn-danger btn-sm">BLOCKED</span>';
                                                        $status = '<a href="actions/malicious-websites-status.php?token='.$rows['token'].'&status=1" class="btn btn-success btn-sm">UNBLOCK</a>';
                                                    } ?>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="malicious-websites-edit.php?token=<?php echo $rows['token'] ?>" class="btn btn-warning btn-sm">EDIT</a>
                                                        <?php echo $status ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Link</th>
                                            <th>Shor Description</th>
                                            <th>Created At</th>
                                            <th>Tags</th>
                                            <th>Status</th>
                                            <th>Actions</th>
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