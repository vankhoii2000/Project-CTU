<?php
include 'connect.php';   

 $timkiem = $_GET['timkiem'];
 $sql1=" SELECT * FROM HANGHOA where TenHH like '%$timkiem%'";
 $result1=mysqli_query($connect,$sql1);

 $sql2 = "SELECT * FROM HINHHANGHOA WHERE TenHH like '%$timkiem%'";
 $result2=mysqli_query($connect,$sql2);
 $hinhanh = mysqli_fetch_assoc($result2);



?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <title>Tìm kiếm</title>
</head>

<body>
    <?php require_once "header.php"; ?>
    <p class="text-center container-fluid fs-2 mt-3">Tìm kiếm với từ khoá: <?= $timkiem ?></p>

    <div class="container">
        <div class="row">
            <?php while($row =  mysqli_fetch_assoc($result1)): ?>
            <div class="col col-lg-3 mt-3">
                <div class="card">
                    <img src="../QUAN_LY/upload_image/<?php echo $row['HinhAnh'] ?>" alt="firl" style="width:259px;height:257px">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['TenHH'] ?></h5>
                        <p class=" center card-text mt-2"><?php echo $row['Gia'] ?> VND</p>
                        <button type="button" class="btn btn-warning">Thêm</button>

                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>


    <?php require_once "footer.php"; ?>

</body>

</html>