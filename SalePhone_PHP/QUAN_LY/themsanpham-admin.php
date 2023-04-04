<?php

include 'connect-admin.php';

$sql2 = "SELECT * FROM LOAIHANGHOA";
$result2 = mysqli_query($connect,$sql2);
    
if(isset($_POST['submit'])) {
    $TenHH = ($_POST['TenHH']);
    $QuyCach = ($_POST['QuyCach']);
    $Gia = ($_POST['Gia']);
    $SoLuongHang = ($_POST['SoLuongHang']);
    $MaLoaiHang = ($_POST['MaLoaiHang']);
    $filename = $_FILES["photo"]["name"];
    $sql = "INSERT INTO HANGHOA (TenHH,QuyCach,Gia,SoLuongHang,MaLoaiHang) VALUES ('$TenHH','$QuyCach','$Gia','$SoLuongHang','$MaLoaiHang')";
    $result = mysqli_query($connect,$sql);
    $productId = mysqli_insert_id($connect);

    //UPLOAD_IMAGE
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "jfif" => "image/jfif");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Lỗi : Vui lòng chọn đúng định dang file.");
    
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Lỗi : Kích thước file lớn hơn giới hạn cho phép");
    
        if(in_array($filetype, $allowed)){
            if(file_exists("upload_image/" . $_FILES["photo"]["name"])){
                echo $_FILES["photo"]["name"] . " đã tồn tại";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload_image/" . $_FILES["photo"]["name"]);
                $message = "Thêm sản phẩm thành công!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            } 
        } else{
            $message = "Lỗi : Có vấn đề xảy ra khi upload file"; 
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    } else{
        $message = "Lỗi: " . $_FILES["photo"]["error"];
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    $filename = str_replace(array('.jpg'),'', $filename);
    $sql3 = "INSERT INTO HINHHANGHOA (TenHinh,MSHH) values ('$filename','$productId')";
    $result3 = mysqli_query($connect,$sql3);
}
    ///////////////////////////////////
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Thêm sản phẩm</title>
    <link href="css/style.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
</head>

<body>
    <?php include 'header-admin.php' ?>
    <div id="layoutSidenav">
        <?php require_once 'menu-admin.php' ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container">
                    <form action="#" method='post' enctype="multipart/form-data">
                        <div>
                            <center>
                                <h3 style="color:green">Thêm sản phẩm</h3>
                            </center>
                        </div>

                        <!-- Hiển thị danh sách loại điện thoại -->
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label" style="color:green">Loại điện
                                thoại</label>
                            <select name="MaLoaiHang" class="form-select form-select-sm"
                                aria-label="Default select example">
                                <?php while($row = mysqli_fetch_assoc($result2)): ?>
                                <option value="<?php echo $row['MaLoaiHang'] ?>"> <?php echo $row['TenLoaiHang'] ?>
                                </option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="color:blue">Tên điện
                                    thoại</span>
                            </div>
                            <input type="text" class="form-control" name="TenHH" placeholder="" aria-label=""
                                aria-describedby="basic-addon1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Thêm hình</label>
                            <input class="form-control" type="file" name="photo" id="fileSelect">
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="color:blue">Thông tin điện thoại</span>
                            </div>
                            <input type="textarea" class="form-control" name="QuyCach" placeholder="" aria-label=""
                                aria-describedby="basic-addon1">
                        </div>
                        <br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="color:blue">Giá</span>
                            </div>
                            <input type="text" class="form-control" name="Gia"
                                aria-label="Amount (to the nearest dollar)">
                            <div class="input-group-append">
                                <span class="input-group-text" style="color:red">USD</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label" style="color:green">Số
                                lượng</label>
                            <input type="text" class="form-control" name='SoLuongHang' id="exampleFormControlInput1"
                                placeholder="">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn" name="submit"
                                style="background:pink; color:black;">Lưu</button>
                        </div>
                    </form>
                </div>

            </main>
        </div>
    </div>
</body>

</html>