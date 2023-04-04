<?php
    include 'connect-admin.php';
    
    
    $sql = "SELECT * FROM HANGHOA where MSHH = {$_GET['id']}";
    $result = mysqli_fetch_assoc(mysqli_query($connect,$sql));

    $sql2 = "SELECT * FROM loaihanghoa";
    $result2 = mysqli_query($connect,$sql2);
    if(isset($_POST['submit'])){
        $TenLoaiHang = ($_POST['TenLoaiHang']);
        $MSHH = $_GET['id'];
        $TenHH = ($_POST['TenHH']);
        $QuyCach = ($_POST['QuyCach']);
        $Gia = ($_POST['Gia']);
        $SoLuongHang = ($_POST['SoLuongHang']);
        $MaLoaiHang = ($_POST['MaLoaiHang']);

        $sql = "UPDATE HANGHOA SET TenHH = '$TenHH', QuyCach='$QuyCach', Gia='$Gia', SoLuongHang='$SoLuongHang', MaLoaiHang='$MaLoaiHang' WHERE MSHH = $MSHH";
        $result = mysqli_query($connect,$sql);
        $filename = $_FILES["photo"]["name"];

        //UPLOAD_IMAGE
        if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $filename = $_FILES["photo"]["name"];
            $filetype = $_FILES["photo"]["type"];
            $filesize = $_FILES["photo"]["size"];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed)) die("Lỗi : Vui lòng chọn đúng định dang file.");
        
            $maxsize = 5 * 1024 * 1024;
            if($filesize > $maxsize) die("Lỗi : Kích thước file lớn hơn giới hạn cho phép");
        
            if(in_array($filetype, $allowed)){
                if(file_exists("../upload/" . $_FILES["photo"]["name"])){
                    echo $_FILES["photo"]["name"] . " đã tồn tại";
                } else{
                    move_uploaded_file($_FILES["photo"]["tmp_name"], "../QUAN_LY/upload_image/" . $_FILES["photo"]["name"]);
                    echo "Upload file thành công";
                }
                $filename = str_replace(array('.jpg'),'', $filename);

                $sql = "UPDATE HINHHANGHOA SET TenHinh = '$filename' WHERE MSHH = $MSHH";
                $result = mysqli_query($connect,$sql);
            } else{
                echo "Lỗi : Có vấn đề xảy ra khi upload file"; 
            }
        } else{
            echo "Lỗi: " . $_FILES["photo"]["error"];
        }

        header("Location: ../QUAN_LY/danhsachsanpham-admin.php");
        exit();
    }
    //////////////////////////////////////////
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="css/style.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <title>Sửa thông tin sản phẩm</title>
</head>

<body>
    <?php include 'header-admin.php'; ?>
    <div id="layoutSidenav">
        <?php require_once 'menu-admin.php' ?>
        <div id="layoutSidenav_content">
            <main class="container ">
                <div>
                    <center>
                        <h3 style="color:green">Cập nhật thông tin sản phẩm</h3>
                    </center>
                </div>
                <form method="post" action="#" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label" style="color:green">Loại điện
                                thoại</label>
                            <select name="MaLoaiHang" class="form-select form-select-sm"
                                aria-label="Default select example">
                                <?php while($value = mysqli_fetch_assoc($result2)): ?>
                                <option value="<?php echo $value['MaLoaiHang'] ?>"
                                    <?php if($value['MaLoaiHang'] == $result['MaLoaiHang']){ echo "selected"; } ?>>
                                    <?php echo $value['TenLoaiHang'] ?>
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
                                aria-describedby="basic-addon1"value="<?= $result['TenHH'] ?>">
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
                                aria-describedby="basic-addon1" value="<?= $result['QuyCach'] ?>">
                        </div>
                        <br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="color:blue">Giá</span>
                            </div>
                            <input type="text" class="form-control" name="Gia"
                                aria-label="Amount (to the nearest dollar)" value="<?= $result['Gia'] ?>">
                            <div class="input-group-append">
                                <span class="input-group-text" style="color:red">USD</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label" style="color:green">Số
                                lượng</label>
                            <input type="text" class="form-control" name='SoLuongHang' id="exampleFormControlInput1"
                                placeholder="" value="<?= $result['SoLuongHang'] ?>">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn" name="submit"
                                style="background:pink; color:black;">Lưu</button>
                        </div>
                </form>
            </main>
        </div>
    </div>
</body>

</html>