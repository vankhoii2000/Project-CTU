<?php
    include 'connect-admin.php';

    $id = $_GET['id'];

    $sql = "SELECT * FROM DON_HANG as DH, TRANG_THAI as TT, KHACH_HANG as KH 
    WHERE DH.ma_khach_hang = KH.ma_khach_hang and TT.ma_don_hang = DH.ma_don_hang and TT.trang_thai = 1 and DH.ma_don_hang = {$id}";
    $donhang = mysqli_query($connect,$sql);

    $sql1 = "SELECT * FROM CHI_TIET_DON_HANG as CTDH, SAN_PHAM as SP, TRANG_THAI as TT
    WHERE CTDH.ma_san_pham = SP.ma_san_pham and CTDH.ma_don_hang = TT.ma_don_hang and TT.trang_thai = 1 and CTDH.ma_don_hang = {$id}";
    $sanpham = mysqli_query($connect, $sql1);


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
    <title>Chi tiết đơn hàng</title>

    <script>
    $('.datepicker').datepicker({
        ok: '',
        clear: 'Clear selection',
        close: 'Cancel'
    })
    </script>
</head>


<body>
    <div class="container-fluid">
        <?php
        include 'header-admin.php';
        ?>

        <h4 class="text-center fs-2 mt-5" style="color:green">CHI TIẾT ĐƠN HÀNG</h4>
        <div class="container mt-5">
            <table class="table table-success">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Mã ĐH</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Điện thoại</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Mail</th>
                        <th scope="col">Ngày mua</th>
                        <th scope="col">Tổng tiền</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($value =  mysqli_fetch_assoc($donhang)):?>
                    <tr>
                        <th scope="row"></th>
                        <td><?php echo $value['ma_don_hang']?></td>
                        <td><?php echo $value['ho_ten']?></td>
                        <td><?php echo $value['dien_thoai']?></td>
                        <td><?php echo $value['dia_chi']?></td>
                        <td><?php echo $value['mail']?></td>
                        <td><?php echo $value['ngay_lap']?></td>
                        <td><?php echo number_format($value['tong_tien']);?></td>
                    <tr>
                        <?php endwhile; ?>
                </tbody>
            </table>
            <table class="table table-success">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <!-- <th scope="col">STT</th> -->
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá tiền</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Ngày mua</th>
                        <th scope="col">Ngày giao hàng</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($value1 =  mysqli_fetch_assoc($sanpham)):?>
                    <tr>
                        <th scope="row"></th>
                        <td><?php echo $value1['ten_san_pham']?></td>
                        <td><?php echo number_format($value1['don_gia'])?></td>
                        <td><?php echo $value1['so_luong_dh']?></td>
                        <td><?php echo $value1['ngay_mua']?></td>
                        <td><?php echo $value1['ngay_giao']?></td>
                    <tr>
                        <?php endwhile; ?>
                </tbody>
            </table>
            <div class="container mt-5">
                <center>
                    <a href="daxuly.php" type="button" class="btn btn-primary mt-3">Trở về</a>
                </center>
            </div>
        </div>
    </div>

</body>



</html>