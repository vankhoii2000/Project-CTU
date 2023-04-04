<?php
    include 'connect-admin.php';
    
    $id = $_GET['id'];

    if($id == "all"){
        $sql = "SELECT * FROM KHACH_HANG ";
        $khachhang = mysqli_query($connect,$sql);
    }else{
        $sql = "SELECT * FROM KHACH_HANG WHERE MA_KHACH_HANG = {$id} ";
        $khachhang = mysqli_query($connect,$sql);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <title>Danh sách khách hàng</title>
</head>

<body>
    <div class="container-fluid">
        <?php
        include 'header-admin.php';
        ?>
        <!-- <h4 class="text-center fs-2 mt-5" style="color:green">DANH SÁCH <?php echo $tenloai['ten_loai']; ?></h4> -->

        <h4 class="text-center fs-2 mt-5" style="color:green">DANH SÁCH KHÁCH HÀNG</h4>
        <div class="container mt-5">
            <table class="table table-success">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <!-- <th scope="col">Số thứ tự</th> -->
                        <th scope="col">Họ tên</th>
                        <th scope="col">Điện thoại</th>
                        <th scope="col">Tài khoản</th>
                        <th scope="col">Mật khẩu</th>
                        <th scope="col">Email</th>
                        <th scope="col">Địa chỉ</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($value =  mysqli_fetch_assoc($khachhang)):?>
                    <tr>
                        <th scope="row"></th>
                        <td><?php echo $value['ho_ten']?></td>
                        <td><?php echo $value['dien_thoai']?></td>
                        <td><?php echo $value['tai_khoan']?></td>
                        <td><?php echo $value['mat_khau']?></td>
                        <td><?php echo $value['mail']?></td>
                        <td><?php echo $value['dia_chi']?></td>
                        <td><a href="xoakhachhang.php?id=<?=$value['ma_khach_hang']?>" type="button" class="btn btn-danger">Xóa</a></td>
                    <tr>
                        <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>