<?php

    include 'connect-admin.php';
    session_start();

    $SoDonDH = $_GET['id'];
    if(isset($_SESSION['username'])){
        $MSNV = $_SESSION['username']['MSNV'];
    }

    $sql = "UPDATE DATHANG SET MSNV = '$MSNV', TrangThaiDH = 0, NgayGH = now() WHERE SoDonDH={$SoDonDH}";
    $result = mysqli_query($connect,$sql);
    
    header("Location: ../QUAN_LY/choxuly-admin.php");
    exit();

?>