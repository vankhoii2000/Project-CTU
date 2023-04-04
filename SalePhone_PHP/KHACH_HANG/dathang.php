<?php
    include 'connect.php';
    session_start();

    if(isset($_POST['submit'])){
        $DiaChi = ($_POST['DiaChi']);
        $MSKH = $_SESSION['taikhoan']['MSKH'];

        $sql = "INSERT INTO DATHANG(MSKH, MSNV, NgayDH, DiaChi) VALUES ('$MSKH',1, now(), '$DiaChi')";
        $datHang = mysqli_query($connect, $sql);
        $id = mysqli_insert_id($connect);    

        foreach($_SESSION['cart'] as $key => $value){
            $MSHH = $value['MSHH'];
            $SoLuong = $value['Soluonghang'];
            $GiaDatHang = $value['Gia'];
            $sql1 = "INSERT INTO CHITIETDATHANG (SoDonDH, MSHH, SoLuong, GiaDatHang, GiamGia) VALUES ($id, $MSHH, $SoLuong, $GiaDatHang, 0)";
            $datHang = mysqli_query($connect,$sql1);


            $sql2 = "update hanghoa set SoLuongHang = SoLuongHang - $SoLuong WHERE MSHH = $MSHH";
            $datHang = mysqli_query($connect,$sql2);
        }
        unset($_SESSION['cart']);
        header("location: dathangthanhcong.php");
    }
   
?>