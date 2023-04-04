<?php
    //Kết nối với Database
    include 'connect.php';

    //Xử lý đăng ký
    $err = [];
    if(isset($_POST['tai_khoan'])){
        $hotenkh = $_POST['ho_ten'];
        $dienthoai = $_POST['dien_thoai'];
        $taikhoan = $_POST['tai_khoan'];
        $matkhau = $_POST['mat_khau'];
        $nhaplaimatkhau = $_POST['nhaplaimatkhau'];
        $mail = $_POST['mail'];
        $diachi =$_POST['dia_chi'];

        if(empty($hotenkh)){
            $err['ho_ten'] = 'Bạn cần nhập họ và tên !';
        }
        if(empty($taikhoan)){
            $err['tai_khoan'] = 'Bạn cần nhập tên tài khoản !';
        }
        if(empty($dienthoai)){
            $err['dien_thoai'] = 'Bạn cần nhập số điện thoại !';
        }
        if(empty($mail)){
            $err['mail'] = 'Bạn cần nhập địa chỉ mail !';
        }
        if(empty($diachi)){
            $err['dia_chi'] = 'Bạn cần nhập đầy đủ thông tin địa chỉ !';
        }
        if(empty($matkhau)){
            $err['mat_khau'] = 'Bạn cần nhập mật khẩu !';
        }
        if($matkhau != $nhaplaimatkhau){
            $err['nhaplaimatkhau'] = 'Nhập lại mật khẩu không trùng khớp !';
        }

        if(empty($err)){
            $sql = "INSERT INTO `khach_hang`(`ho_ten`, `dien_thoai`, `tai_khoan`, `mat_khau`, `mail`, `dia_chi`) VALUES ('$hotenkh','$dienthoai','$taikhoan','$matkhau','$mail','$diachi')";
            $query = mysqli_query($connect,$sql);
            
            if($query){
                header('location: login.php');
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <title>Đăng ký</title>

    <style>
    .has-error {
        color: black;
    }
    </style>



</head>

<body>
    <div class="container">
        <div class="bodycolor">
            <div id="wrapper">
                <form action="" method="POST" id="form-login">
                    <h1 class="form-heading">ĐĂNG KÝ TÀI KHOẢN</h1>
                    <div class="form-group">
                        <i class="far fa-user"></i>
                        <input type="text" class="form-input" name="ho_ten" placeholder="Họ tên">
                        <div class="has-error">
                            <span><?php echo (isset($err['ho_ten']))?$err['ho_ten']:'' ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <input type="text" class="form-input" name="dia_chi" placeholder="Địa chỉ">
                        <div class="has-error">
                            <span><?php echo (isset($err['dia_chi']))?$err['dia_chi']:'' ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <input type="text" class="form-input" name="dien_thoai" placeholder="Số điện thoại">
                        <div class="has-error">
                            <span><?php echo (isset($err['dien_thoai']))?$err['dien_thoai']:'' ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input type="text" class="form-input" name="mail" placeholder="Mail">
                        <div class="has-error">
                            <span><?php echo (isset($err['mail']))?$err['mail']:'' ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                        <input type="text" class="form-input" name="tai_khoan" placeholder="Tên đăng nhập">
                        <div class="has-error">
                            <span><?php echo (isset($err['tai_khoan']))?$err['tai_khoan']:'' ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i>
                        <input type="password" class="form-input" name="mat_khau" placeholder="Mật khẩu">
                        <div id="eye">
                            <i class="far fa-eye"></i>
                        </div>
                        <div class="has-error">
                            <span><?php echo (isset($err['mat_khau']))?$err['mat_khau']:'' ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i>
                        <input type="password" class="form-input" name="nhaplaimatkhau" placeholder="Nhập lại mật khẩu">
                        <div id="eye">
                            <i class="far fa-eye"></i>
                        </div>
                        <div class="has-error">
                            <span><?php echo (isset($err['nhaplaimatkhau']))?$err['nhaplaimatkhau']:'' ?></span>
                        </div>
                    </div>
                    <input type="submit" value="Đăng ký" class="form-submit">
                </form>
            </div>
        </div>
    </div>




</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="js/app.js"></script>

</html>