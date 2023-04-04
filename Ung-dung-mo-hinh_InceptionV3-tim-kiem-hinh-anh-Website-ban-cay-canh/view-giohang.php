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

    <title>Giỏ hàng</title>
</head>

<body>
    <div class="container">
        <?php require_once 'menu.php'; ?>
    </div>

    <?php
    include 'connect.php';
    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
    $tai_khoan = (isset($_SESSION['tai_khoan'])) ? $_SESSION['tai_khoan'] : [];

    ?>

    <!--THÔNG TIN GIỎ HÀNG -->
    <strong>
        <h4 style="color:blue">
            <p class="text-center container-fluid fs-2 mt-3">Thông tin giỏ hàng</p>
        </h4>
    </strong>
    <div class="container">
        <div class="row">
            <?php if(isset($_SESSION['tai_khoan'])){ ?>
            <?php if(!isset($_SESSION['cart'])) { ?>
                <center><h4>
                    Giỏ hàng rỗng
                </h4></center>
                <?php }else{ ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tên cây cảnh</th>
                        <th scope="col">Số Lượng </th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $tongtien=0; ?>
                    <?php foreach($cart as $key => $value):
                        $tongtien += ($value['gia_tien'] * $value['Soluonghang'])?>
                    <tr>
                        <td><?php echo $value['ten_san_pham']  ?></td>
                        <td>
                            <form action="giohang.php" method="get">
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="id" value="<?php echo $value['ma_san_pham'] ?>">
                                <input type="text" name="Soluonghang" value="<?php echo $value['Soluonghang']  ?>">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </form>
                        </td>
                        <td><?php  echo $value['Soluonghang'];echo " x " ;  echo number_format($value['gia_tien']);echo " đ ";  ?>
                        </td>
                        <td><a href="./giohang.php?id=<?php echo $value['ma_san_pham'] ?>&action=delete"
                                class="btn btn-danger">Xóa</a></td>
                    </tr>
                    <?php endforeach ?>
                    <tr>
                        <td></td>
                        <td><b>Thành Tiền</b></td>
                        <td><?php echo number_format($tongtien) ?> đ</td>
                    </tr>
                </tbody>
            </table>
            <?php }; ?>

            <!-- THÔNG TIN GIAO HÀNG VÀ ĐẶT HÀNG -->
            <strong>
                <h4 style="color:blue">
                    <p class="text-center container-fluid fs-2 mt-3">Thông tin giao hàng</p>
                </h4>
                </strong>

                <form method="POST" action="dathang.php">
                    <div class="mb-3">
                        <label for="ho_ten_kh" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" id="ho_ten_kh" name="ho_ten_kh"
                            value="<?php echo $_SESSION['tai_khoan']['ho_ten'] ?>">
                        <input type="hidden" class="form-control" id="ma_khach_hang" name="ma_khach_hang"
                            value="<?php echo $_SESSION['tai_khoan']['ma_khach_hang'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="dien_thoai" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="dien_thoai" name="dien_thoai"
                            value="<?php echo $_SESSION['tai_khoan']['dien_thoai'] ?>">
                    </div>
                        <input type="hidden" name="tong_tien" value="<?php echo($tongtien)?>">
                    <div class="mb-3">
                        <label for="diachi" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" id="diachi" name="diachi"
                            value="<?php echo $_SESSION['tai_khoan']['dia_chi'] ?>">
                    </div>
                    <div class="text-center">
                        <button name="submit" type="submit" class="btn btn-primary">Đặt Mua</button>
                    </div>
                </form>
                <?php }else{ ?>
                <div>
                    <center>
                        <h2 style="color:red;">Đăng nhập để xem thông tin!</h2>
                    </center>
                </div>

                <?php }; ?>

        </div>
    </div>



    <?php require_once "footer.php"; ?>
</body>

</html>