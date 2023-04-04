<?php
    include 'connect-admin.php';
   
    $sql = "SELECT * FROM LOAIHANGHOA";
    $result = mysqli_query($connect,$sql);
    if(isset($_POST['submit'])) {
        $TenLoaiHang = ($_POST['TenLoaiHang']);
        $sql1 = "INSERT INTO LOAIHANGHOA (TenLoaiHang) VALUES ('$TenLoaiHang')";
        $result1 = mysqli_query($connect,$sql1);

        header("Location: ../QUAN_LY/loaisanpham-admin.php");
        exit();
    }

   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Loại điện thoại</title>
    <link href="css/style.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
</head>

<body>
    <?php include 'header-admin.php'; ?>
    <div id="layoutSidenav">
        <?php require_once 'menu-admin.php' ?>
        <div id="layoutSidenav_content">
            <main>
                <div>
                    <center>
                        <h3 style="color:green;font-size: 30px;">Danh sách loại điện thoại</h3>
                    </center>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mã loại hàng</th>
                            <th scope="col">Tên loại hàng</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($value =  mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <th scope="row"><?php echo $value['MaLoaiHang'] ?></th>
                            <td><?php echo $value['TenLoaiHang'] ?></td>
                            <td>
                                <a href="viewsanpham-admin.php?id=<?=$value['MaLoaiHang']?>">
                                    <button type="submit" class="btn"
                                        style="background:yellow; color:black; font:boder;">Danh sách điện thoại</button>
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <div id="layoutSidenav_content">
                    <main class="container ">
                        <div>
                            <center>
                                <h3 style="color:green">Thêm loại điện thoại</h3>
                            </center>
                        </div>
                        <form method="post" action="#">

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label"
                                    style="color:blue; font:boder; font-size: 25px;">Loại Điện thoại</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="TenLoaiHang"
                                    placeholder="">

                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn" name="submit"
                                    style="background:green; color:white; font:boder;"> Thêm</button>
                            </div>
                        </form>
                    </main>

            </main>

        </div>
    </div>
</body>

</html>