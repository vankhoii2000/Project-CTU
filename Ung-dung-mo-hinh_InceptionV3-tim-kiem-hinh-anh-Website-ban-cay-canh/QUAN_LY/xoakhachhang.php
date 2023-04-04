<?php

    include 'connect-admin.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM KHACH_HANG WHERE MA_KHACH_HANG = '$id'";
    $result = mysqli_query($connect,$sql);

    header("Location: ./khachhang.php?id=all");
    exit();

?>