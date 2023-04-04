<?php
    //Kết nối với Database
    include 'connect.php';

    //Xử lý đăng ký
    $err = [];
    if(isset($_POST['taikhoan'])){
        $hotenkh = $_POST['hotenkh'];
        $tencongty = $_POST['tencongty'];
        $diachi = $_POST['diachi'];
        $sodienthoai = $_POST['sodienthoai'];
        $taikhoan = $_POST['taikhoan'];
        $matkhau = $_POST['matkhau'];
        $nhaplaimatkhau = $_POST['nhaplaimatkhau'];

        if(empty($hotenkh)){
            $err['hotenkh'] = 'Bạn cần nhập họ và tên !';
        }
        if(empty($taikhoan)){
            $err['taikhoan'] = 'Bạn cần nhập tên tài khoản !';
        }
        if(empty($sodienthoai)){
            $err['sodienthoai'] = 'Bạn cần nhập số điện thoại !';
        }
        if(empty($diachi)){
            $err['diachi'] = 'Bạn cần nhập đầy đủ thông tin địa chỉ !';
        }
        if(empty($matkhau)){
            $err['matkhau'] = 'Bạn cần nhập mật khẩu !';
        }
        if($matkhau != $nhaplaimatkhau){
            $err['nhaplaimatkhau'] = 'Nhập lại mật khẩu không trùng khớp !';
        }

        if(empty($err)){
            $sql = "INSERT INTO khachhang(hotenkh,tencongty,sodienthoai,taikhoan,matkhau) VALUES ('$hotenkh','$tencongty','$sodienthoai','$taikhoan','$matkhau')";
            $query = mysqli_query($connect,$sql);
            
            $MSKH = mysqli_insert_id($connect);
            $sql2 = "INSERT INTO diachikh(DiaChi, MSKH) VALUES('".$diachi."','".$MSKH."')";
            mysqli_query($connect, $sql2);
            if($query){
                header('location: index.php');
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="uft-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dangky.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="js/app.js"></script>
    <title>Đăng ký</title>

    <style>
        .has-error{
            color:red;
        }
        .bodycolor{
            background:gray;
        }
    </style>


    
</head>
<body>
    <div class="bodycolor">
    <div id="wrapper">
        <form action="" method="POST" id="form-login">
            <h1 class="form-heading">Đăng ký</h1>
            <div class="form-group">
            <i class="far fa-user"></i>
                <input type="text" class="form-input" name="hotenkh" placeholder="Họ và tên">
                <div class ="has-error">
                    <span><?php echo (isset($err['hotenkh']))?$err['hotenkh']:'' ?></span>
                </div>
            </div>
            <div class="form-group">
            <i class="fa fa-users" aria-hidden="true"></i>
                <input type="text" class="form-input" name="tencongty" placeholder="Tên công ty">
            </div>
            <div class="form-group">
            <i class="fa fa-road" aria-hidden="true"></i>
                <input type="text" class="form-input" name="diachi" placeholder="Địa chỉ">
                <div class ="has-error">
                    <span><?php echo (isset($err['diachi']))?$err['diachi']:'' ?></span>
                </div>
            </div>
            <div class="form-group">
            <i class="fa fa-phone" aria-hidden="true"></i>
                <input type="text" class="form-input" name="sodienthoai" placeholder="Số điện thoại">
                <div class ="has-error">
                    <span><?php echo (isset($err['sodienthoai']))?$err['sodienthoai']:'' ?></span>
                </div>
            </div>
            <div class="form-group">
            <i class="fa fa-user-circle" aria-hidden="true"></i>
                <input type="text" class="form-input" name="taikhoan" placeholder="Tên đăng nhập">
                <div class ="has-error">
                    <span><?php echo (isset($err['taikhoan']))?$err['taikhoan']:'' ?></span>
                </div>
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" name="matkhau" placeholder="Mật khẩu">
                <div class ="has-error">
                    <span><?php echo (isset($err['matkhau']))?$err['matkhau']:'' ?></span>
                </div>
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" name="nhaplaimatkhau" placeholder="Nhập lại mật khẩu">
                <div class ="has-error">
                    <span><?php echo (isset($err['nhaplaimatkhau']))?$err['nhaplaimatkhau']:'' ?></span>
                </div>
            </div>
            <input type="submit" value="Đăng ký" class="form-submit">
            <div>
            </div>
        </form>
    </div>

    </div>
    
    
</body>
</html>


