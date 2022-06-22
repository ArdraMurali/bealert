<?php
$server = 0;
$db_host        = 'localhost';
$db_user        = 'root';
$db_pass        = '';
$db_database    = 'bealert';
if ($server == 1) {
    $db_host        = 'localhost';
    $db_user        = 'ewolweDefault';
    $db_pass        = 'bwa@R3Vl[UVQ';
    $db_database    = 'ewolwe_bealert';

    $db_user        = 'ewolwk2y_basic_user';
    $db_pass        = 'uc8j0c9cj7dd';
    $db_database    = 'ewolwk2y_bealert';
    $url = 'https://bealert.ewolwe.in/';
}
$db = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
