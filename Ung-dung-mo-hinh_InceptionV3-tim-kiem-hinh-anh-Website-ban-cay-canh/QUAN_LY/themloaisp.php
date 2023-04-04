<?php
    include 'connect-admin.php';
   
    $sql = "SELECT * FROM LOAI_SAN_PHAM";
    $sanpham = mysqli_query($connect,$sql);

    if(isset($_POST['submit'])) {
        $tenloai = ($_POST['ten_loai']);
        $sql1 = "INSERT INTO LOAI_SAN_PHAM (`ten_loai`) VALUES ('$tenloai')";
        $result1 = mysqli_query($connect,$sql1);

        header("Location: ./themloaisp.php");
    }

   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <title>Danh sách loại cây cảnh</title>
</head>

<body>
    <div class="container-fluid">
        <?php
        include 'header-admin.php';
        ?>
 
        <h4 class="text-center fs-2 mt-5" style="color:green">DANH SÁCH LOẠI CÂY CẢNH</h4>
        <div class="container mt-5">
            <table class="table table-success">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Tên loại cây</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($value =  mysqli_fetch_assoc($sanpham)):?>
                    <tr>
                        <th scope="row"></th>
                        <td><?php echo $value['ten_loai']?></td>
                        <td><a href="capnhatloaisp.php?id=<?=$value['ma_loai']?>" type="button" class="btn btn-warning">Cập nhật</a></td>
                    <tr>
                        <?php endwhile; ?>
                </tbody>
            </table>

            <div>
                <center>
                    <form action="" method="POST">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="ten_loai" placeholder=""
                                aria-label="" aria-describedby="basic-addon1" value="">
                            <button type="submit" name="submit" class="btn btn-success">Thêm loại</button>
                        </div> 
                    </form>
                    
                </center>   
            </div>
        </div>
    </div>

</body>

</html>