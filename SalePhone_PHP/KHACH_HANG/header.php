<?php
    include 'connect.php';
    session_start();

    $sql = "SELECT * FROM LOAIHANGHOA";
    $LoaiHangHoa = mysqli_query($connect,$sql);

    $taikhoan = (isset($_SESSION['taikhoan'])) ? $_SESSION['taikhoan']: [];

    if(isset($_SESSION['taikhoan']))
    {
        if($_SESSION['admin'] == true)
        {
            unset($_SESSION['taikhoan']);
            unset($_SESSION['admin']);
        }
    }

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Header -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="./index.php" style="color: red;"><h3>K-Smartphone</h3></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li><a class="nav-link" href="./index.php">Trang chủ</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Điện thoại
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php while($row = mysqli_fetch_assoc($LoaiHangHoa)): ?>
                    <li><a class="dropdown-item"
                            href="phanloaisp.php?id=<?= $row['MaLoaiHang'] ?>"><?php echo $row['TenLoaiHang'] ?></a>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="view_giohang.php">Giỏ hàng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="giaohang.php">Lịch sử đơn hàng</a>
            </li>

        </ul>
        <form class="d-flex" href="timkiem.php">
            <input class="form-control me-2" type="search" placeholder="Nhập tên sản phẩm" aria-label="Search"
                name="timkiem">
            <button class="btn btn-outline-dark" type="submit" style="color:white;"></button>

        </form>
        <!-- Tai khoan -->
        <div class="taikhoan">
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if(isset($taikhoan['taikhoan'])) {?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $taikhoan['taikhoan'] ?>
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
                            <li> <a href="dangnhap.php">Đăng nhập</a></li>
                            <li> <a href="dangky.php">Đăng ký</a></li>
                        </ul>
                    </li>

                    <?php }?>
                </ul>
            </div>
        </div>
    </div>
</nav>