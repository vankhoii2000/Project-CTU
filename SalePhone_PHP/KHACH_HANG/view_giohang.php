<?php
    require_once "header.php";
    include 'connect.php';

    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];


    $DiaChi = Null;
    if(isset($_SESSION['taikhoan']))
    {
        $sqlDiaChi = "SELECT * FROM `diachikh` WHERE `MSKH` = {$_SESSION['taikhoan']['MSKH']}";

        $queryDiaChi = mysqli_query($connect,$sqlDiaChi);
    
        $DiaChi = mysqli_fetch_assoc($queryDiaChi);
    
    }


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

    <title>GIỎ HÀNG VÀ ĐẶT HÀNG</title>
</head>

<body>



    <!--THÔNG TIN GIỎ HÀNG -->
    <p class="text-center container-fluid fs-2 mt-3">Giỏ hàng của bạn</p>
    <div class="container">
        <div class="row">
        <?php if(isset($_SESSION['taikhoan'])){ ?>
            <?php if(isset($_SESSION['cart'])) : ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Số Lượng </th>
                        <th scope="col">Giá</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $tongtien=0; ?>
                    <?php foreach($cart as $key => $value):
                        $tongtien += ($value['Gia'] * $value['Soluonghang'])?>
                    <tr>
                        <td><?php echo $value['TenHH']  ?></td>
                        <td> 
                            <form action="giohang.php" method="get">
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="id" value ="<?php echo $value['MSHH'] ?>">
                                <input type="text" name="Soluonghang" value="<?php echo $value['Soluonghang']  ?>">
                                <button type="submit">Cập nhật</button>
                            </form>
                        </td>
                        <td><?php  echo $value['Soluonghang'];echo " x " ;  echo number_format($value['Gia']);echo " USD ";  ?></td>
                        <td><a href="./giohang.php?id=<?php echo $value['MSHH'] ?>&action=delete" class="btn btn-danger">Xóa</a></td>
                    </tr>
                    <?php endforeach ?>
                    <tr>
                        <td></td>
                        <td><b>Thành Tiền</b></td>
                        <td><?php echo number_format($tongtien) ?> USD</td>
                    </tr>
                </tbody>
            </table>
            <?php endif; ?> 

            <!-- THÔNG TIN GIAO HÀNG VÀ ĐẶT HÀNG -->
            <p class="text-center container-fluid fs-2 mt-3">Thông tin giao hàng</p>

            <form method="post" action="dathang.php">
                <div class="mb-3">
                    <label for="HoTenKH" class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" id="HoTenKH" name="HoTenKH" value="<?php echo $_SESSION['taikhoan']['HoTenKH'] ?>">
                </div>
                <div class="mb-3">
                    <label for="SoDienThoai" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="SoDienThoai" name="SoDienThoai" value ="<?php echo $_SESSION['taikhoan']['SoDienThoai'] ?>">
                </div>
                <div class="mb-3">
                    <label for="DiaChi" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="DiaChi" name="DiaChi" value="<?php echo $DiaChi['DiaChi'] ?>">
                </div>
                <div class="mb-3">
                    <label for="TenCongTy" class="form-label">Tên công ty</label>
                    <input type="text" class="form-control" id="TenCongTy" name="TenCongTy" value="<?php echo $_SESSION['taikhoan']['TenCongTy'] ?>">
                </div>
                <div class="mb-3">
                    <label for="SoFax" class="form-label">SoFax</label>
                    <input type="text" class="form-control" id="SoFax" name="SoFax" value="<?php echo $_SESSION['taikhoan']['SoFax'] ?>">
                </div>
                <div class="text-center">
                    <button name="submit" type="submit" class="btn btn-primary">Đặt Mua</button>
                </div>
            </form>
            <?php }else{ ?>
                <div>
                    <center><h2 style="color:red;" >Vui lòng đăng nhập để mua hàng!</h2></center>
                    <center><h4 style="color:green">Nếu chưa có tài khoản vui lòng đăng ký tài khoản!</h4></center>
                </div>
                
            <?php }; ?>
        
        </div>
    </div>



    <?php require_once "footer.php"; ?>
</body>

</html>