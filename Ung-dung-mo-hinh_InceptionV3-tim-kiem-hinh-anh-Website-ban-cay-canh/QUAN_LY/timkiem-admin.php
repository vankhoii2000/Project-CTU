<?php
include 'connect-admin.php';   

 
if(isset($_GET['timkiem'])){
    $timkiem = $_GET['timkiem'];
    $sql = "SELECT * FROM SAN_PHAM AS SP INNER JOIN HINH_ANH AS HA ON HA.ma_san_pham = SP.ma_san_pham 
            INNER JOIN LOAI_SAN_PHAM AS LSP ON LSP.ma_loai = SP.ma_loai WHERE `ten_san_pham` LIKE '%$timkiem%'";
            
    $sanpham = mysqli_query($connect,$sql);
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
    <title>Tìm kiếm</title>
</head>

<body>
    <div class="container-fluid">
        <?php
        include 'header-admin.php';
        ?>

        <h4 class="text-center fs-2 mt-5" style="color:green">DANH SÁCH TÌM KIẾM</h4>
        <p class="text-center container-fluid fs-2 mt-3">Tìm kiếm với từ khoá: <?= $timkiem ?></p>
        <div class="container mt-5">
            <table class="table table-success">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <!-- <th scope="col">Số thứ tự</th> -->
                        <th scope="col">Tên cây cảnh</th>
                        <th scope="col">Tên loại</th>
                        <th scope="col">Mã loại</th>
                        <th scope="col">Mã sản phẩm</th>
                        <th scope="col">Giá tiền</th>
                        <th scope="col">Số lượng</th>
                        <th rowspan="2">Chi tiết</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($value =  mysqli_fetch_assoc($sanpham)):?>
                    <tr>
                        <th scope="row"></th>
                        <!-- <td><?php echo $value['stt']?></td> -->
                        <td><?php echo $value['ten_san_pham']?></td>
                        <td><?php echo $value['ten_loai']?></td>
                        <td><?php echo $value['ma_loai']?></td>
                        <td><?php echo $value['ma_san_pham']?></td>
                        <td><?php echo number_format($value['gia_tien']);?> đ</td>
                        <td><?php echo $value['so_luong']?></td>
                        <td><a href="suasanpham-admin.php?id=<?=$value['ma_san_pham']?>" type="button"
                                class="btn btn-warning">Sửa</a></td>

                        <td><a href="xoasanpham-admin.php?id=<?=$value['ma_san_pham']?>" type="button"
                                class="btn btn-danger">Xóa</a></td>
                    <tr>
                        <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>