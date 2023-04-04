<?php
    include 'connect.php';
    session_start();
    session_unset();
    unset($_SESSION['taikhoan']);
    header('location: ./index.php');

?>