<?php 
  include 'connect.php';

  $Maloaihang = $_GET['id']; 
  $sql="SELECT * FROM hanghoa LEFT JOIN hinhhanghoa ON hinhhanghoa.MSHH = hanghoa.MSHH WHERE MaLoaiHang = $Maloaihang";
  $HangHoa = mysqli_query($connect,$sql);
  
  $sql2 = "SELECT * FROM LOAIHANGHOA";
  $LoaiHangHoa = mysqli_query($connect,"Select * from loaihanghoa");

  $sql3 = "SELECT * FROM LOAIHANGHOA WHERE MaLoaiHang = $Maloaihang";
  $LoaiHang = mysqli_fetch_assoc(mysqli_query($connect,$sql3));
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <title>Phân loại</title>
</head>

<body>
  <!-- Menu -->
  <?php require_once "header.php"; ?>

  <ul class="nav nav-tabs">
  <?php while($row =  mysqli_fetch_assoc($LoaiHangHoa)): ?>
    <li class="nav-item">
      <a class="nav-link" href="/loaisanpham.php?id=<?= $row['MaLoaiHang'] ?>"><?php echo $row['TenLoaiHang'] ?></a>
    </li>
    <?php endwhile; ?>
  </ul>

  <p class="text-center container-fluid fs-2 mt-3">Tìm Kiếm <?php echo $LoaiHang['TenLoaiHang']; ?></p>  

  <div class="container">
    <div class="row">

      <?php while($row =  mysqli_fetch_assoc($HangHoa)):?>
      <div class="col col-lg-3 mt-3">
        <div class="card">
          <img src="../QUAN_LY/upload_image/<?php echo $row['TenHinh']?>.jpg" alt="firl" style="width:259px;height:257px">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['TenHH'] ?></h5>
            <p class=" center card-text mt-2"><?php echo $row['Gia'] ?> USD</p>

            <a href="giohang.php?id=<?php echo $row['MSHH'] ?>">
            <button type="button" class="btn btn-warning" style="background:red; color:white; font:boder;">Mua ngay</button></a>

            <a href="chitietsp.php?id=<?php $intval = (int)$row['MSHH']; echo $intval; ?>">
            <button type="button" class="btn btn-warning" style="background:white; color:black;">Chi tiết</button></a>
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