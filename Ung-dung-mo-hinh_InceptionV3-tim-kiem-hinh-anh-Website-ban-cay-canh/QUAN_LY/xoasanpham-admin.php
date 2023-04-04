<?php

    include 'connect-admin.php';

    $id = $_GET['id'];    
    $sql = "DELETE FROM HINH_ANH WHERE MA_SAN_PHAM = '$id'";
    $result = mysqli_query($connect,$sql);
    $sql1 = "DELETE FROM SAN_PHAM WHERE MA_SAN_PHAM = '$id'";
    $result1 = mysqli_query($connect,$sql1);

    header("Location: ./phanloaisp-admin.php?id=all");
    exit();

?>