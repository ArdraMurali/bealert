<?php
session_start();
unset($_SESSION['SESS_USER_ID2']);
unset($_SESSION['SESS_USER_TOKEN2']);
unset($_SESSION['SESS_USER_NAME2']);
unset($_SESSION['SESS_USER_TYPE2']);
unset($_SESSION['SESS_USER_EMAIL2']);
unset($_SESSION['SESS_USER_CONTACT2']);
?>
<script>
    window.location.href = '../login.php?signout';
</script>