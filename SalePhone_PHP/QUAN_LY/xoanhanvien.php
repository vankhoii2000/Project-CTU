<?php

    include 'connect-admin.php';

    $MSNV = $_GET['id']; 

    $sql = "DELETE FROM NHANVIEN WHERE MSNV = '$MSNV'";
    $result = mysqli_query($connect,$sql);
    
    header("Location: ../QUAN_LY/danhsachnhanvien.php");
    exit();
    
?>