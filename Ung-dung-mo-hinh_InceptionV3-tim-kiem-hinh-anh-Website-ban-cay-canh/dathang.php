<?php
    include 'connect.php';
    session_start();
    
    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
    
    if(isset($_POST['submit'])){
        $makhachhang = $_POST['ma_khach_hang'];
        $tongtien = $_POST['tong_tien'];
        $ngaylap = date("Y/m/d");
        $sql = "INSERT INTO DON_HANG(ma_khach_hang, tong_tien, ngay_lap) VALUES ('$makhachhang', '$tongtien', '$ngaylap' )";
        $datHang = mysqli_query($connect, $sql);
        $madonhang = mysqli_insert_id($connect);    

        foreach($cart as $key => $value){
            $masanpham = $value['ma_san_pham'];
            $soluong = $value['Soluonghang'];
            $dongia = $value['gia_tien'];
            $sql1 = "INSERT INTO `chi_tiet_don_hang`(`ma_don_hang`, `ma_san_pham`, `so_luong_dh`, `don_gia`, `ngay_mua`, `ngay_giao`) 
                    VALUES ($madonhang, $masanpham, $soluong, $dongia, now(), '')";
            $datHang = mysqli_query($connect,$sql1);


            $sql2 = "UPDATE SAN_PHAM set so_luong = so_luong - $soluong WHERE ma_san_pham = $masanpham";
            $datHang = mysqli_query($connect,$sql2);

        }
        $sql3 = "INSERT INTO `trang_thai`(`ma_don_hang`, `trang_thai`) VALUES ('$madonhang','0')";
        $datHang4 = mysqli_query($connect,$sql3);

        unset($_SESSION['cart']);
        header("location: dathangthanhcong.php");
    }
   
?>