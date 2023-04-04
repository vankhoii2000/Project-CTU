<?php
      include 'connect.php';
      if(isset($_GET['timkiem']))
      {
        $tiemkiem = $_GET['timkiem']; 
        $sql = "SELECT * FROM hanghoa LEFT JOIN hinhhanghoa ON hinhhanghoa.MSHH = hanghoa.MSHH where `hanghoa`.`TenHH` LIKE '%$tiemkiem%' ";
        $HangHoa = mysqli_query($connect,$sql);
      }else{
        $sql = "SELECT * FROM hanghoa LEFT JOIN hinhhanghoa ON hinhhanghoa.MSHH = hanghoa.MSHH";
        $HangHoa = mysqli_query($connect,$sql);
      }
      

?>

<!doctype html>
<html lang="en">

<head>
    <!-- thư viện bootstrap -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>K-Smartphone</title>
</head>
<style>
  body{
    display: inline;
    width: 1000px;;
  }
</style>

<body>
    <!--Header -->
    <?php require_once "header.php"; ?>

    <!--Hình ảnh Banner-->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="image/banner1.jpg" alt="First slide"
                    style="width: 800px;0px;height:400px">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="image/banner4.jpg" alt="Second slide"
                    style="width:1000px;height: 400px;">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="image/banner3.jpg" alt="Second slide"
                    style="width:1000px;height: 400px;">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="image/banner2.jpg" alt="Third slide"
                    style="width:1000px;height: 400px;">
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>



    <!---->
    <div class="container">
        <div class="row">
            <!---->
            <?php while($value =  mysqli_fetch_array($HangHoa)): ?>
            <div class="col col-lg-3 mt-3">
                <!---->
                <div class="card">
                    <img src="../QUAN_LY/upload_image/<?php echo $value['TenHinh']?>.jpg" alt="image" style="width:259px;height:257px">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $value['TenHH'] ?></h5>
                        <p class=" center card-text mt-2"><?php echo $value['Gia'] ?> USD</p>
                        <a href="giohang.php?id=<?php echo $value['MSHH'] ?>">
                            <button type="button" class="btn btn-warning"
                                style="background:red; color:white; font:boder;">Mua ngay</button></a>

                        <a href="chitietsp.php?id=<?php $intval = (int)$value['MSHH']; echo $intval; ?>">
                            <button type="button" class="btn btn-warning" style="background:white; color:black;">Chi
                                tiết</button></a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>


    <?php require_once "footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>

</html>