<?php
    include 'connect-admin.php';

    $sql = "SELECT * FROM DON_HANG as DH, TRANG_THAI as TT, KHACH_HANG as KH 
    WHERE DH.ma_khach_hang = KH.ma_khach_hang and TT.ma_don_hang = DH.ma_don_hang and TT.trang_thai = 0";
    $donhang = mysqli_query($connect,$sql);



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
    <title>Danh sách đơn hàng</title>
</head>

<body>
    <div class="container-fluid">
        <?php
        include 'header-admin.php';
        ?>

        <h4 class="text-center fs-2 mt-5" style="color:green">DANH SÁCH ĐƠN HÀNG ĐANG CHỜ</h4>
        <div class="container mt-5">
            <table class="table table-success">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">Họ tên khách hàng</th>
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
                        <td><?php echo $value['ngay_lap']?></td>
                        <td><?php echo number_format($value['tong_tien']);?></td>                        
                        <td><a href="chitietdh.php?id=<?=$value['ma_don_hang']?>" type="button" class="btn btn-primary">Chi tiết</a></td>
                    <tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>