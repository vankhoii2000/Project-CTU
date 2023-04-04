<?php
    include 'connect-admin.php';
    session_start();
    session_unset();
    unset($_SESSION['username']);
    header('location: index.php');

?>