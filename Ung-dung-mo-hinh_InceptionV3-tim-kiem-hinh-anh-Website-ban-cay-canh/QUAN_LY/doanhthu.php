<?php
    include 'connect-admin.php';

    $sql = "SELECT * FROM CHITIETDATHANG as CTDH, HANGHOA as HH, DATHANG as DH WHERE CTDH.MSHH = HH.MSHH 
    and CTDH.SoDonDH = DH.SoDonDH and DH.TrangThaiDH = 3";
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
                        <h2 style="color:blue">Doanh thu</h2>
                    </center>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mã số đơn hàng</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng tiền</th>                    
                        </tr>
                    </thead>
                    <tbody>
                    <?php $tongdoanhthu = 0;?>
                        <?php while($value =  mysqli_fetch_assoc($result)):?>
                        <tr>
                            <th><?php echo $value['SoDonDH'] ?></th>
                            <td><?php echo $value['TenHH'] ?></td>
                            <td><?php echo $value['Gia'];echo" USD"?></td>
                            <td><?php echo $value['SoLuong']?></td>
                            <td style="color:green; font-weight:bold"><?php $tongtien = $value['Gia'] * $value['SoLuong'];echo number_format($tongtien); echo" USD" ?></td>  
                        </tr>
                        <?php $tongdoanhthu += $tongtien?>
                        <?php endwhile; ?>
                    </tbody>
                    
                         <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th scope="col">Tổng doanh thu</th>
                            <th style="color:red; font-weight:bold"><?php echo number_format($tongdoanhthu) ; echo " USD"?></th>
                        </tr>
                </table>
            </main>
        </div>
    </div>

</body>

</html>