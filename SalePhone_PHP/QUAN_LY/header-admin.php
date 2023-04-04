<?php
      include 'connect-admin.php';
      session_start();
      $taikhoan = (isset($_SESSION['username'])) ? $_SESSION['username']: [];


?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
  </script>

<!-- Header -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="" style="color: red;">Quản trị K-Smartphone</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div style="color:orange">
        ||
    </div>
        <!-- Tai khoan -->
        <div class="taikhoan">
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if(isset($taikhoan['username'])) {?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" style="color:orange">
                            <i class="fas fa-user fa-fw"></i>
                            <?php echo $taikhoan['username'] ?>
                        </a>
                        <ul class=dropdown-menu>
                        <li> <a href="dangnhap-admin.php">Đăng nhập</a></li>
                            <li> <a href="dangxuat-admin.php">Đăng xuất</a></li>
                        </ul>
                    </li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </div>
</nav>