<?php
    include 'connect-admin.php';
    session_start();

    if(isset($_SESSION['username'])){
        $checkadmin = $_SESSION['username']['MSNV'];
        if($checkadmin == 1){
            header("Location: ../QUAN_LY/view-adduser.php");
        }else
        {
            $message = "Bạn không đủ quyền để tạo tài khoản! Vui lòng quay lại trang trước";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        
    }else{
        $message = "Bạn không đủ quyền để tạo tài khoản! Vui lòng quay lại trang trước";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }


?>