<?php
include 'connect.php';
session_start();

if(isset($_POST['binhluan'])){
        $hotenkh = $_POST['ho_ten'];
        $masanpham = $_POST['ma_san_pham'];
        $binhluanmoi = $_POST['noi_dung'];
        $ngay_bl = date("d/m/y");
        $sql = "INSERT INTO `binh_luan`(`ho_ten_kh`, `ma_san_pham`, `noi_dung`, `ngay_bl`) VALUES ('$hotenkh','$masanpham','$binhluanmoi','$ngay_bl')";
        $thembinhluan = mysqli_query($connect, $sql);
}else{
    $message = "Vui lòng đăng nhập để bình luận";
    echo "<script type='text/javascript'>alert('$message');</script>";
};
header("location: ./chitietcc.php?chitiet=$masanpham")


?>