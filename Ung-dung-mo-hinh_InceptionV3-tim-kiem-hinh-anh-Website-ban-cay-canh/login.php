<?php
    include 'connect.php';
    session_start();

    if(isset($_POST['tai_khoan'])){
        $taikhoan = $_POST['tai_khoan'];
        $matkhau = $_POST['mat_khau'];
        
        $sql = "SELECT * FROM khach_hang where tai_khoan = '$taikhoan'";
        $query = mysqli_query($connect,$sql);
        $data = mysqli_fetch_assoc($query);
        $checktaikhoan = mysqli_num_rows($query);

        $sql1 = "SELECT * FROM QUAN_TRI_VIEN WHERE tai_khoan = '$taikhoan'";
        $query1 = mysqli_query($connect,$sql1);
        $data1 = mysqli_fetch_assoc($query1);
        $checkadmin = mysqli_num_rows($query1);

        if($checkadmin == 1){
            if($matkhau == $data1['mat_khau']){

                $_SESSION['tai_khoan'] = $data1;

                header('location: QUAN_LY\index-admin.php');
            }
            else{
                $message = "Mật khẩu không chính xác!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
        elseif($checktaikhoan == 1){
            if($matkhau == $data['mat_khau']){

                $_SESSION['tai_khoan'] = $data;

                header('location: index.php');
            }
            else{
                $message = "Mật khẩu không chính xác!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }else{
            $message = "Tài khoản không tồn tại!";
            echo "<script type='text/javascript'>alert('$message');</script>"; 
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
    <title>Form đăng nhập</title>
</head>

<body>
    <div id="wrapper">
        <form action="" id="form-login" method="POST">
            <h1 class="form-heading">Đăng nhập</h1>
            <div class="form-group">
                <i class="far fa-user"></i>
                <input type="text" class="form-input" name="tai_khoan" placeholder="Tên đăng nhập">
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" name="mat_khau" placeholder="Mật khẩu">
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <input type="submit" value="Đăng nhập" class="form-submit">
        </form>
    </div>
    
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="js/app.js"></script>
</html