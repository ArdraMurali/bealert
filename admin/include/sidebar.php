<div class="header-outer">
    <div class="header">
        <div class="page-title" style="margin: .9rem 0 0 1rem;">
            BELAERT ADMIN PANEL
            <?php if (isset($title) && trim($title) != '') {
                echo ' - ' . $title;
            } ?>
        </div>
    </div>
</div>
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <div class="header-left">
                <a href="#" class="logo">
                    <img src="assets/img/logo.png" class="w-100">
                </a>
            </div>
            <ul class="sidebar-ul">
                <li class="active">
                    <a href="dashboard.php"><img src="assets/img/sidebar/icon-1.png" alt="icon"><span>Dashboard</span></a>
                </li>
                <li class="active mt-2">
                    <a href="malicious-websites.php"><img src="assets/img/sidebar/icon-7.png" alt="icon"><span>malicious websites</span></a>
                </li>
                <li class="active mt-2">
                    <a href="malicious-websites-reported.php"><img src="assets/img/sidebar/icon-7.png" alt="icon"><span>Reported websites</span></a>
                </li>
                <li class="active mt-2">
                    <a href="users.php"><img src="assets/img/sidebar/icon-3.png" alt="icon"><span>Users</span></a>
                </li>
                <li class="active mt-2">
                    <a href="feedback.php"><img src="assets/img/sidebar/icon-3.png" alt="icon"><span>Feedbacks</span></a>
                </li>
                <li class="active mt-2">
                    <a href="password.php"><img src="assets/img/sidebar/icon-3.png" alt="icon"><span>Update Password</span></a>
                </li>
                <li class="active mt-2">
                    <a href="logout.php"><img src="assets/img/sidebar/icon-2.png" alt="icon"><span>Logout</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>