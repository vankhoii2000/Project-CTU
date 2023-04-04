<?php

  include 'connect.php';
  if (isset($_SESSION['tai_khoan'])){
    $hoten = $_SESSION['tai_khoan']['ho_ten'];
  }else{
    $hoten='';
  }
  if (isset($_GET['chitiet'])){
    $id = intval($_GET['chitiet']);
    $sql = "SELECT * FROM binh_luan WHERE ma_san_pham = {$id}";
    $binhluan = mysqli_query($connect,$sql);
  }
  
  
?>

<div class="container mt-5 mb-5">
    <h3><strong>Đánh giá sản phẩm</strong></h3>
    <div class="panel-body">
        <form method="post" action="them_binhluan.php">
            <input class="form-control mb-2" type="text" name="ho_ten" value="<?=$hoten?>">
            <textarea class="form-control" placeholder="Viết bình luận ở đây ..." rows="3" name="noi_dung" value="noi_dung"></textarea>
            <br>
            <input type="hidden" name="ma_san_pham" value="<?=$id?>">
            <center><button name="binhluan" type="submit" class="btn btn-info pull-right">Bình luận</button></center>
        </form>
        <hr>
        <?php while($value =  mysqli_fetch_array($binhluan)): ?>
        <ul class="media-list">
            <li class="media">
                <a href="#" class="pull-left ml-2 mt-1">
                    <img src="image\user.svg" style="width: 20px;" alt="" class="img-circle">
                </a>
                <div class="media-body">
                    <strong class="text-success">@<?php echo $value['ho_ten_kh']?></strong>
                    <p>
                        <?php echo $value['noi_dung'] ?>
                    </p>
                    <span class="text-muted pull-right">
                        <small class="text-muted"><?php echo $value['ngay_bl']?></small>
                    </span>
                </div>
            </li>
        </ul>
        <?php endwhile; ?>
    </div> 

</div>