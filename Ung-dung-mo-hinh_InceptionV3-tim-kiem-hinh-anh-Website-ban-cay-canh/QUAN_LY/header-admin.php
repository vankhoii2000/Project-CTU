<?php
      include 'connect-admin.php';
      session_start();
      $taikhoan = (isset($_SESSION['tai_khoan'])) ? $_SESSION['tai_khoan']: [];
      $sql = "SELECT * FROM LOAI_SAN_PHAM";
      $loaisanpham = mysqli_query($connect,$sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <title>trang quản lý</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index-admin.php" style="color:red">SHOP CÂY CẢNH</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="./index-admin.php">Trang chủ<span class="sr-only">(current)</span></a>
                </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Danh mục sản phẩm
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php while($row = mysqli_fetch_assoc($loaisanpham)): ?>
                        <a class="dropdown-item"
                            href="phanloaisp-admin.php?id=<?= $row['ma_loai'] ?>"><?php echo $row['ten_loai'] ?></a>
                        <?php endwhile; ?>
                        <a class="dropdown-item" href="phanloaisp-admin.php?id=all">Tất cả loại cây</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Thêm sản phẩm
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="themloaisp.php">Thêm loại cây</a>
                        <a class="dropdown-item" href="themsp.php">Thêm cây</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Đơn hàng
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="dangcho.php">Đang chờ</a>
                        <a class="dropdown-item" href="daxuly.php">Đã xác nhận</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./binhluan-admin.php">Bình luận</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./khachhang.php?id=all">Khách hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./ykien-admin.php">Phản hồi ý kiến</a>
                </li>


                <?php if(isset($taikhoan['tai_khoan'])) {?>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person" viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                        </svg>
                        <i><?php echo $taikhoan['tai_khoan'] ?></i>
                    </a>

                    <ul class=dropdown-menu>

                        <li> <a href="./dangxuat-admin.php">Đăng xuất</a></li>
                    </ul>
                </li>
                <?php } ?>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="./timkiem-admin.php?timkiem="  method="GET">
                <input class="form-control mr-sm-2" type="search" placeholder="Nhập tên cây cảnh" aria-label="Search" name="timkiem">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm</button>
            </form>
        </div>
    </nav>

</body>

</html>