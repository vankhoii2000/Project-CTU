<?php

    include 'connect.php';
    session_start();

 if(isset($_POST['submit'])) {
    $HoTenKH = ($_POST['HoTenKH']);
    $DiaChi = ($_POST['DiaChi']);
    $SoDienThoai = ($_POST['SoDienThoai']);

    $sql = "insert into khachhang (HoTenKH,SoDienthoai,DiaChi) values ('$HoTenKH','$SoDienThoai','$DiaChi')";
    $KhachHang = mysqli_query($connect,$sql);


    $MSKH = mysqli_insert_id($connect) ;
    $sql2 = "insert into dathang (MSKH) values ({$MSKH}) ";
    $DatHang = mysqli_query($connect,$sql2);

    $SoDonDH = mysqli_insert_id($connect);

    foreach($_SESSION['cart'] as $key => $value)
    {
        $SoLuong = $value["SoLuongHang"];
        $GiaDatHang = $value["Gia"];
        $sql2 = "insert into chitietdathang (MSHH, SoLuong, GiaDatHang) values ($MSHH, $SoLuong, $GiaDatHang)";
        $DatHang = mysqli_query($connect,$sql2);

    }
    unset($_SESSION['cart']);

    header("location: /dathangthanhcong.php");
}
 ?>  
