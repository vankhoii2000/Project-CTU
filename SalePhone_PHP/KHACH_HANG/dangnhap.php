<?php
    include 'connect.php';
    session_start();

    if(isset($_POST['taikhoan'])){
        $taikhoan = $_POST['taikhoan'];
        $matkhau = $_POST['matkhau'];
        
        $sql = "SELECT * FROM khachhang where taikhoan = '$taikhoan'";
        $query = mysqli_query($connect,$sql);
        $data = mysqli_fetch_assoc($query);
        $checktaikhoan = mysqli_num_rows($query);

        if($checktaikhoan == 1){
            if($matkhau == $data['matkhau']){
                $_SESSION['taikhoan'] = $data;
                $_SESSION['admin'] = false;
                header('location: index.php');
            }
            else{
                $message = "Mật khẩu không chính xác!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
        else{
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
    <link rel="stylesheet" href="css/dangnhap.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- <script src="js/app.js"></script> -->
    <title>Đăng nhập</title>
    <style>
        .colorbody{
            background: white;
        }
    </style>
</head>
<body>
    <div class="colorbody">
    
    <?php if(isset($_SESSION['is_admin']) and ($_SESSION['is_admin'] == true) ): ?>
        Bạn đã đăng nhập với quyền admin
    <?php else: ?>
    <div id="wrapper">
        <form action="" method="POST" id="form-login">
            <h1 class="form-heading">Đăng nhập</h1>
            Tên đăng nhập: khachhang1 ; Mật khẩu: 123456
            <div class="form-group">
                <i class="far fa-user"></i>
                <input type="text" class="form-input" name="taikhoan" placeholder="Tên đăng nhập">
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" name="matkhau" placeholder="Mật khẩu">
            </div>
            <input type="submit" value="Đăng nhập" class="form-submit">
        </form>
   
    </div>
    <?php endif; ?>

    
</body>

</html>