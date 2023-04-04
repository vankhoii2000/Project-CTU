<?php

    include 'connect-admin.php';
    session_start();

    $SoDonDH = $_GET['id'];
    $sql = "UPDATE DATHANG SET TrangThaiDH = 3 WHERE SoDonDH={$SoDonDH}";
    $result = mysqli_query($connect,$sql);

    header("Location: ../QUAN_LY/view-dagiao.php");
    exit();

?>