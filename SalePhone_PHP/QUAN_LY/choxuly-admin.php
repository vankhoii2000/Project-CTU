<?php
    include 'connect-admin.php';

    $sql = "SELECT * FROM DATHANG as DH,CHITIETDATHANG as CTDH, HANGHOA as HH, KHACHHANG as KH 
    WHERE DH.SoDonDH = CTDH.SoDonDH and CTDH.MSHH = HH.MSHH and DH.MSKH = KH.MSKH and DH.TrangThaiDH = 1";
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
    <title>Chờ xử lý</title>
</head>

<body>
    <?php include 'header-admin.php'; ?>
    <div id="layoutSidenav">
        <?php require_once 'menu-admin.php' ?>
        <div id="layoutSidenav_content">
            <main>
                <div>
                    <center>
                        <h2 style="color:blue">Danh sách đơn hàng</h2>
                    </center>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mã số đơn hàng</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Tên khách hàng</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Số Điện Thoại</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($value =  mysqli_fetch_assoc($result)):?>
                        <tr>
                            <th><?php echo $value['ID'] ?></th>
                            <td><?php echo $value['TenHH'] ?></td>
                            <td><?php echo $value['HoTenKH']?></td>
                            <td><?php echo $value['DiaChi']?></td>
                            <td><?php echo $value['SoDienThoai']?></td>
                            <td>
                                <a href="xacnhan-admin.php?id=<?=$value['SoDonDH']?>">
                                    <button type="button" class="btn"
                                    style="background:blue; color:white; font:boder;">Xác nhận</button>
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