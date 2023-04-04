<?php
    include 'connect.php';
    require_once "header.php";

    if(isset($_GET['id'])){
        $id = intval($_GET['id']);
        $sql = "SELECT * FROM HANGHOA WHERE MSHH = {$id}";
        $sql1 = "SELECT * FROM HINHHANGHOA WHERE MSHH = {$id}";

        $query = mysqli_query($connect,$sql);
        $query1 = mysqli_query($connect,$sql1);

        $sanpham = mysqli_fetch_assoc($query);
        $hinhanh = mysqli_fetch_assoc($query1);
    }
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Chi tiết</title>
</head>

<body>
    <p class="text-center container-fluid fs-2 mt-3">Thông tin sản phẩm</p>

    <div class="container">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Cấu hình</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><?php echo $sanpham['TenHH']  ?></td>
                        <td>
                            <div class="card">
                                <img src="../QUAN_LY/upload_image/<?php echo $hinhanh['TenHinh']?>.jpg" alt="firl"
                                    style="width: 200px;px;height:200px">
                                <div class="card-body">
                        </td>
                        <td><?php echo $sanpham['QuyCach']  ?></td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>

</html>