<?php
    include 'connect-admin.php';
    session_start();
    session_unset();
    unset($_SESSION['tai_khoan']);
    header('location: ../index.php');

?>