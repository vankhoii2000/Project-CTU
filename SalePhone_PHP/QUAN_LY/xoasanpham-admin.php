<?php

    include 'connect-admin.php';

    $MSHH = $_GET['id'];    
    
    $sql = "delete from chitietdathang where MSHH = '$MSHH'";
    $result = mysqli_query($connect,$sql);
    $sql = "delete from hinhhanghoa where MSHH = '$MSHH'";
    $result = mysqli_query($connect,$sql);
    $sql1 = "delete from hanghoa where MSHH = '$MSHH'";
    $result = mysqli_query($connect,$sql1);
    header("Location: ../QUAN_LY/danhsachsanpham-admin.php");
    exit();

?>