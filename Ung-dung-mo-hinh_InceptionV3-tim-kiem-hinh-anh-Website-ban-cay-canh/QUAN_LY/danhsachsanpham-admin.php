<?php
    include 'connect-admin.php';

    $sql = "SELECT * FROM hanghoa LEFT JOIN hinhhanghoa ON hinhhanghoa.MSHH = hanghoa.MSHH";
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
                <div>
                    <center>
                        <h2 style="color:blue">Danh sách điện thoại</h2>
                    </center>
                </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Mã sản phẩm</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượng còn lại</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($value =  mysqli_fetch_assoc($result)):?>
                            <tr>
                                <th><?php echo $value['MSHH'] ?></th>
                                <th><img src="../QUAN_LY/upload_image/<?php echo $value['TenHinh']?>.jpg" alt="firl"
                                        style="width:139px;height:137px"></th>
                                <td><?php echo $value['TenHH'] ?></td>
                                <td><?php echo $value['SoLuongHang']?></td>
                                <td>
                                    <a href="suasanpham-admin.php?id=<?=$value['MSHH']?>">
                                        <button type="button" class="btn"
                                            style="background:green; color:white; font:boder;">Sửa</button>
                                    </a>
                                </td>
                                <td>
                                    <a href="xoasanpham-admin.php?id=<?=$value['MSHH']?>">
                                        <button type="button" class="btn"
                                            style="background:red; color:white; font:boder;">Xóa</button>
                                    </a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>

                </div>

            </main>
        </div>
    </div>

</body>

</html>