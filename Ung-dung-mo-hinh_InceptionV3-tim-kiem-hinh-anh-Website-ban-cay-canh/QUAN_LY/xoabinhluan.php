<?php

    include 'connect-admin.php';

    $id = $_GET['id'];    
    $sql = "DELETE FROM BINH_LUAN WHERE so_thu_tu = '$id'";
    $result = mysqli_query($connect,$sql);

    header("Location: ./binhluan-admin.php");
    exit();

?>