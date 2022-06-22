<?php
session_start();
unset($_SESSION['SESS_USER_ID']);
unset($_SESSION['SESS_USER_TOKEN']);
unset($_SESSION['SESS_USER_NAME']);
unset($_SESSION['SESS_USER_TYPE']);
unset($_SESSION['SESS_USER_EMAIL']);
?>
<script>
    window.location.href = '../admin/?signout';
</script>