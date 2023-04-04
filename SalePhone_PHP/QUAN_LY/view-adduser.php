<?php
    include 'connect-admin.php';

    if(isset($_POST['username'])){
        $HoTenNV = $_POST['HoTenNV'];
        $ChucVu = $_POST['ChucVu'];
        $DiaChi = $_POST['DiaChi'];
        $SoDienThoai = $_POST['SoDienThoai'];
        $taikhoan = $_POST['username'];
        $matkhau = $_POST['pass'];

        $sql = "INSERT INTO NHANVIEN(HoTenNV,ChucVu,DiaChi,SoDienThoai,username,pass) VALUES ('$HoTenNV','$ChucVu','$DiaChi','$SoDienThoai','$taikhoan','$matkhau')";
        $query = mysqli_query($connect,$sql);
        if($query){
            header('location: ../QUAN_LY/adduser.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tạo tài khoản</title>
    <link href="css/style.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
</head>

<body>
    <?php include 'header-admin.php' ?>
    <div id="layoutSidenav">
        <?php require_once 'menu-admin.php' ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container">
                    <form action="" method='post' enctype="multipart/form-data">
                        <div>
                            <center>
                                <h3 style="color:green">Tạo tài khoản</h3>
                            </center>
                        </div>            
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Họ và tên</label>
                            <input class="form-control" type="text" name="HoTenNV" id="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Chức vụ</label>
                            <input class="form-control" type="text" name="ChucVu" id="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Địa chỉ</label>
                            <input class="form-control" type="text" name="DiaChi" id="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Số Điện thoại</label>
                            <input class="form-control" type="text" name="SoDienThoai" id="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Tên tài khoản</label>
                            <input class="form-control" type="text" name="username" id="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Mật khẩu</label>
                            <input class="form-control" type="password" name="pass" id="">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn" name="submit"
                                style="background:green; color:black;">Tạo tài khoản</button>
                        </div>
                    </form>
                </div>

            </main>
        </div>
    </div>
</body>

</html>