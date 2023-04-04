<?php
    require_once "header.php";
    include 'connect.php';

    $MSKH = null;
    if(isset($_SESSION['taikhoan'])){
        $MSKH = $_SESSION['taikhoan']['MSKH'];
    }
    $sql = "SELECT * FROM DATHANG as DH,CHITIETDATHANG as CTDH, HANGHOA as HH, HINHHANGHOA as HHH, KHACHHANG as KH 
    WHERE DH.SoDonDH = CTDH.SoDonDH and CTDH.MSHH = HH.MSHH and HH.MSHH = HHH.MSHH and KH.MSKH=DH.MSKH 
    and KH.MSKH = $MSKH";
    $result = mysqli_query($connect,$sql);

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>THÔNG TIN GIAO HÀNG</title>
</head>

<body>


    <!--THÔNG TIN GIAO HÀNG -->
    <p class="text-center container-fluid fs-2 mt-3">Thông tin giao hàng</p>
    <div class="container">
        <div class="row">
            <?php if(isset($_SESSION['taikhoan']['MSKH'])){ ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Hình ảnh </th>
                        <th scope="col">Số Lượng </th>
                        <th scope="col">Giá</th>
                        <th scope="col">Ngày đặt hàng</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Ngày giao hàng</th>
                        <th scope="col">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $thanhtien = 0;?>
                    <?php while($value =  mysqli_fetch_assoc($result)):?>
                    <tr>
                        <td>
                            <?php echo $value['TenHH'] ?>
                        </td>
                        <td>
                            <img src="../QUAN_LY/upload_image/<?php echo $value['TenHinh']?>.jpg" alt="firl"
                                style="width:139px;height:137px">
                        </td>
                        <td>
                            <?php echo $value['SoLuong'] ?>
                        </td>
                        <td>
                            <?php echo $value['Gia']; echo " USD" ?>
                        </td>
                        <td>
                            <?php echo $value['NgayDH'] ?>
                        </td>
                        <td style="color:green; font-size: 15px;font-weight: bold">
                            <?php
                            switch ($value['TrangThaiDH']) {
                                case 1:
                                    echo "Chờ xác nhận";
                                    break;
                                case 0:
                                    echo "Đang vận chuyển";
                                    break;
                                case 3:
                                    echo "Đã giao hàng"; 
                                
                            }
                        ?>
                        </td>
                        <td>
                            <?php echo $value['DiaChi']; ?>
                        </td>
                        <td>
                            <?php echo"3 ngày sau ";  $dt = new DateTime($value['NgayGH']); echo $dt->format('d-m-Y'); ?>
                        </td>
                        <td style="color:red; font-size: 15px;font-weight: bold">
                            <?php $tongtien = $value['Gia']*$value['SoLuong'];?>
                            <?php echo number_format($tongtien); echo " USD"?>
                        </td>
                        <?php $thanhtien += $tongtien?>
                    </tr>
                    <?php endwhile;?>
                </tbody>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th scope="col">Thành tiền</th>
                    <th scope="col"><?php echo number_format($thanhtien) ; echo " USD"?></th>
                </tr>
            </table>
            <?php }else{ ?>
            <div>
                <center>
                    <h2 style="color:red;">Bạn chưa đăng nhập để kiểm tra giao hàng!</h2>
                </center>
                <center>
                    <h4 style="color:green">Vui lòng đăng nhập để kiểm tra</h4>
                </center>
            </div>
            <?php }?>
        </div>
    </div>
</body>

</html>