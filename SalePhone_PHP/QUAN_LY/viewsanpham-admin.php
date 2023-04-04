<?php
    include 'connect-admin.php';

    $MaLoaiHang = $_GET['id'];
    $sql = "SELECT * FROM hanghoa LEFT JOIN hinhhanghoa ON hinhhanghoa.MSHH = hanghoa.MSHH WHERE MaLoaiHang = {$_GET['id']}";
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
    <title>Danh sách điện thoại</title>
</head>

<body>
    <?php include 'header-admin.php'; ?>
    <div id="layoutSidenav">
        <?php require_once 'menu-admin.php' ?>
        <div id="layoutSidenav_content">
            <main>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Số lượng</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($value =  mysqli_fetch_assoc($result)):?>
                        <tr>
                            <th><img src="../QUAN_LY/upload_image/<?php echo $value['TenHinh']?>.jpg" alt="firl"
                                    style="width:139px;height:137px"></th>
                            <td><?php echo $value['TenHH'] ?></td>
                            <td><?php echo $value['SoLuongHang']?></td>
                        </tr>
                        <?php endwhile; ?>

                    </tbody>
                </table>
            </main>
        </div>
    </div>

</body>

</html>