<?php
    include 'connect.php';
    session_start();
    $sql = "SELECT * FROM LOAI_SAN_PHAM";
    $loaisanpham = mysqli_query($connect,$sql);

    $taikhoan = (isset($_SESSION['tai_khoan'])) ? $_SESSION['tai_khoan']: [];
    
    // if(isset($_SESSION['tai_khoan']))
    // {
    //     if($_SESSION['admin'] == true)
    //     {
    //         unset($_SESSION['tai_khoan']);
    //         unset($_SESSION['admin']);
    //     }
    // }
    
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="container">
    <center>
        <div class="col">
            <a href="index.php"><img src="image\banner.jpg" alt=""></a>
        </div>
    </center>

</div>
<div class="container" style="padding: 0px;">
    <center>
        <div class="col">
            <nav class="navbar-brand navbar-expand-lg navbar-light bg-success">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Danh mục sản phẩm
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php while($row = mysqli_fetch_assoc($loaisanpham)): ?>
                                <a class="dropdown-item"
                                    href="phanloaisp.php?id=<?= $row['ma_loai'] ?>"><?php echo $row['ten_loai'] ?></a>
                                <?php endwhile; ?>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="./timkiemhinhanh.php">Tìm kiếm hình ảnh</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./lienhe.php">Liên hệ</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Giỏ hàng
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="./view-giohang.php">Thông tin giỏ hàng</a>
                                <a class="dropdown-item" href="./lichsugiohang.php">Lịch sử đặt hàng</a>
                            </div>
                        </li>



                    </ul>
                    <form class="form-inline my-2 my-lg-0" action="./timkiem.php?timkiem=" method="GET">

                        <input class="form-control mr-sm-2" type="search" name="timkiem" placeholder="Nhập tên cây cảnh"
                            aria-label="Search">
                    </form>
                    <!--TAI KHOAN-->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <?php if(isset($taikhoan['tai_khoan'])) {?>
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href=""
                                    id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-person" viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                    </svg>
                                    <i><?php echo $taikhoan['tai_khoan'] ?></i>
                                </a>

                                <ul class=dropdown-menu>

                                    <li> <a href="dangxuat.php">Đăng xuất</a></li>
                                </ul>
                            </li>
                            <?php }else{  ?>
                            <li class="nav-item dropdown">

                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Tài khoản
                                </a>
                                <ul class=dropdown-menu>
                                    <li> <a href="login.php">Đăng nhập</a></li>
                                    <li> <a href="dangky.php">Đăng ký</a></li>
                                </ul>
                            </li>

                            <?php }?>
                        </ul>
                    </div>
                </div>
        </div>
        </nav>
</div>
</center>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>