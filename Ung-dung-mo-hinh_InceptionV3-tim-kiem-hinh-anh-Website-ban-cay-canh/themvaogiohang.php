<?php
    include 'connect.php';

    if(isset($_GET['id'])){
        $id = intval($_GET['id']);
        $sql = "SELECT * FROM san_pham WHERE ma_san_pham = {$id}";
        $sql1 = "SELECT * FROM hinh_anh WHERE ma_san_pham = {$id}";

        $query = mysqli_query($connect,$sql);
        $query1 = mysqli_query($connect,$sql1);

        $sanpham = mysqli_fetch_assoc($query);
        $hinhanh = mysqli_fetch_assoc($query1);
    }
?>
