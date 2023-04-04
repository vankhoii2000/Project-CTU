<?php
    include 'connect-admin.php';

    $sql = "SELECT * FROM NHANVIEN WHERE MSNV != 1";
    $result = mysqli_query($connect,$sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="css/style.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <title>Danh sách nhân viên</title>
</head>

<body>
    <?php include 'header-admin.php'; ?>
    <div id="layoutSidenav">
        <?php require_once 'menu-admin.php' ?>
        <div id="layoutSidenav_content">
            <main>
                <div>
                    <center>
                        <h2 style="color:blue">Danh sách điện thoại</h2>
                    </center>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Số thứ tự</th>
                            <th scope="col">Họ tên</th>
                            <th scope="col">Chức vụ</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Số Điện thoại</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($value =  mysqli_fetch_assoc($result)):?>
                        <tr>
                            <th><?php echo $value['MSNV'] ?></th>
                            <td><?php echo $value['HoTenNV'] ?></td>
                            <td><?php echo $value['ChucVu']?></td>
                            <td><?php echo $value['DiaChi'] ?></td>
                            <td><?php echo $value['SoDienThoai'] ?></td>
                            <td>
                                <a href="xoanhanvien.php?id=<?=$value['MSNV']?>">
                                    <button type="button" class="btn"
                                        style="background:red; color:white; font:boder;">Xóa</button>
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </main>
        </div>
    </div>

</body>

</html>