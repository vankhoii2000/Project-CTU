<?php
    include 'connect.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Lịch sử giỏ hàng</title>
</head>

<body>
    <div class="container">
        <?php require_once 'menu.php'; ?>
    </div>

    <?php if(isset($_SESSION['tai_khoan'])){ 
        $makhachhang = $_SESSION['tai_khoan']['ma_khach_hang'];
        $sql = "SELECT * FROM DON_HANG AS DH, CHI_TIET_DON_HANG AS CTDH, TRANG_THAI AS TT, SAN_PHAM AS SP 
                WHERE DH.MA_DON_HANG = CTDH.MA_DON_HANG AND DH.MA_DON_HANG = TT.MA_DON_HANG AND SP.MA_SAN_PHAM = CTDH.MA_SAN_PHAM
                AND TT.TRANG_THAI = 0 AND DH.MA_KHACH_HANG = {$makhachhang}";
        $result = mysqli_query($connect, $sql);

        $sql1 = "SELECT * FROM DON_HANG AS DH, CHI_TIET_DON_HANG AS CTDH, TRANG_THAI AS TT, SAN_PHAM AS SP 
                WHERE DH.MA_DON_HANG = CTDH.MA_DON_HANG AND DH.MA_DON_HANG = TT.MA_DON_HANG AND SP.MA_SAN_PHAM = CTDH.MA_SAN_PHAM
                AND TT.TRANG_THAI = 1 AND DH.MA_KHACH_HANG = {$makhachhang}";
        $result1 = mysqli_query($connect, $sql1);
    ?>

    <!--DON HANG CHO XAC NHAN -->
    <strong>
        <h4 style="color:blue">
            <p class="text-center container-fluid fs-2 mt-3">Đơn hàng chờ xác nhận</p>
        </h4>
    </strong>
    <div class="container">

        <div class="row">
            <table class="table table-success">
                <thead>
                    <?php while($value =  mysqli_fetch_assoc($result)):?>
                    <tr>
                        <th scope="col">Mã đơn hàng</th>
                        <td><?php echo $value['ma_don_hang']?></td>
                    </tr>
                    <tr>

                        <th scope="col">Tên cây cảnh</th>
                        <th scope="col">Số Lượng </th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Ngày mua</th>
                        <th scope="col">Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $value['ten_san_pham']?></td>
                        <td><?php echo $value['so_luong_dh']?></td>
                        <td><?php echo number_format($value['don_gia'])?></td>
                        <td><?php echo $value['ngay_mua']?></td>
                        <td><?php echo $value['tong_tien']?></td>
                    </tr>
                    <?php endwhile;?>
                </tbody>
            </table>

            <!-- Lịch sử giỏ hàng -->
            <h4 class="text-center fs-2 mt-5" style="color:green">Lịch sử giỏ hàng</h4>
            <div class="container mt-5">
                <table class="table table-success">
                    <thead>
                        <?php while($value1 =  mysqli_fetch_assoc($result1)):?>
                        <tr>

                            <th scope="col">Mã đơn hàng</th>
                            <th scope="col">Họ tên khách hàng</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Ngày mua</th>
                            <th scope="col">Ngày giao</th>
                            <th scope="col">Tổng tiền</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $value1['ma_don_hang']?></td>
                            <td><?php echo $_SESSION['tai_khoan']['ho_ten'];?></td>
                            <td><?php echo $_SESSION['tai_khoan']['dia_chi']?></td>
                            <td><?php echo $value1['ngay_mua']?></td>
                            <td><?php echo $value1['ngay_giao']?></td>
                            <td><?php echo $value1['tong_tien']?></td>
                        </tr>
                        <?php endwhile;?>

                    </tbody>
                </table>
                <?php }else{ ?>
                <div>
                    <center>
                        <h2 style="color:red;">Đăng nhập để xem thông tin!</h2>
                    </center>
                </div>
                <?php }; ?>
            </div>


            <?php require_once "footer.php"; ?>

</body>

</html>