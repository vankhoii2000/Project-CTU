<?php
    include 'connect-admin.php';
    
    $sql2 = "SELECT * FROM LOAI_SAN_PHAM";
    $result2 = mysqli_query($connect,$sql2);

    function convert_name($str) {
		$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
		$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
		$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
		$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
		$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
		$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
		$str = preg_replace("/(đ)/", 'd', $str);
		$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'a', $str);
		$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'e', $str);
		$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
		$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'o', $str);
		$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'u', $str);
		$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'y', $str);
		$str = preg_replace("/(Đ)/", 'd', $str);
		$str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
		$str = preg_replace("/( )/", '', $str);
		return $str;
	}

    if(isset($_POST['submit'])){
        $maloai = ($_POST['ma_loai']);
        $tensanpham = ($_POST['ten_san_pham']);
        $giatien = ($_POST['gia_tien']);
        $kichthuoc = ($_POST['kich_thuoc']);
        $soluong = ($_POST['so_luong']);
        $dacdiem = ($_POST['dac_diem']);
        $congdung = ($_POST['cong_dung']);

        $sql = "INSERT INTO `san_pham`(`ma_loai`, `ten_san_pham`, `gia_tien`, `kich_thuoc`, `so_luong`, `dac_diem`, `cong_dung`) 
        VALUES ('$maloai','$tensanpham','$giatien','$kichthuoc','$soluong','$dacdiem','$congdung')"; 
        $result = mysqli_query($connect,$sql);

        $masanpham = mysqli_insert_id($connect);

        $filename = $_FILES["photo"]["name"];
        $videomota = $_POST['video_mota'];

        

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
            
            $folder = convert_name($tensanpham) ;
            $folder_path = strtolower(substr($folder, 0, -1));
            mkdir("../QUAN_LY/upload_image/" . $folder_path ."/");

            if(in_array($filetype, $allowed)){
                if(file_exists(" ../QUAN_LY/upload_image/ " . $folder_path ."/" . $_FILES["photo"]["name"])){
                    echo $_FILES["photo"]["name"] . " đã tồn tại";
                } else{
                    move_uploaded_file($_FILES["photo"]["tmp_name"], "../QUAN_LY/upload_image/". $folder_path ."/" . $_FILES["photo"]["name"]);
                    echo "Upload file thành công";
                }
                $filename = str_replace(array('.jpg'),'', $filename);

                $sql4 = "INSERT INTO `hinh_anh`(`ma_san_pham`, `ten_hinh`, `video_mota`) VALUES ('$masanpham','$filename','$videomota')";
                $result4 = mysqli_query($connect,$sql4);
            } else{
                echo "Lỗi : Có vấn đề xảy ra khi upload file"; 
            }
        } else{
            echo "Lỗi: " . $_FILES["photo"]["error"];
        }
        
        header("Location: ./phanloaisp-admin.php?id=all");
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
    <link href="css/style.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <title>Thêm sản phẩm</title>

    <style>
    .purple-border textarea {
        border: 1px solid #ba68c8;
    }

    .green-border-focus .form-control:focus {
        border: 1px solid #8bc34a;
        box-shadow: 0 0 0 0.2rem rgba(139, 195, 74, .25);
    }
    </style>

</head>

<body>

    <div class="container-fluid">
        <?php include 'header-admin.php';?>

        <div class="container" style="padding:15px">
        <h4 class="text-center fs-2 mt-5" style="color:green">THÊM SẢN PHẨM</h4>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="table table-success">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Tên loại cây</th>
                            <td>
                                <div class="mb-3">
                                    <select name="ma_loai" class="form-select form-select-sm"
                                        aria-label="Default select example">

                                        <?php while($value = mysqli_fetch_assoc($result2)): ?>
                                        <option value="<?php echo $value['ma_loai'] ?>">
                                            <?php  echo $value['ten_loai']; ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Tên cây cảnh</th>
                            <td>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="ten_san_pham" placeholder=""
                                        aria-label="" aria-describedby="basic-addon1"
                                        value="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Giá tiền</th>
                            <td>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="gia_tien"
                                        aria-label="Amount (to the nearest dollar)" value="">
                                    <div class="input-group-append">
                                        <span class="input-group-text" style="color:red">vnđ</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Kích thước</th>
                            <td>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="kich_thuoc" placeholder=""
                                        aria-label="" aria-describedby="basic-addon1"
                                        value="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Số lượng</th>
                            <td>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="so_luong" placeholder="" aria-label=""
                                        aria-describedby="basic-addon1" value="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Đặc điểm</th>
                            <td>
                                <div class="form-group green-border-focus">
                                    <textarea class="form-control" id="exampleFormControlTextarea4" rows="4" name="dac_diem">
                                    </textarea>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Công dụng</th>
                            <td>
                                <div class="form-group green-border-focus">
                                    <textarea class="form-control" id="exampleFormControlTextarea4" rows="4" name="cong_dung">
                                    </textarea>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Hình ảnh</th>
                            <td>
                                <input class="form-control" type="file" name="photo" id="fileSelect">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Link video</th>
                            <td><div class="input-group mb-3">
                                    <input type="text" class="form-control" name="video_mota" placeholder="" aria-label=""
                                        aria-describedby="basic-addon1" value="">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <button type="submit" class="btn btn-success" name="submit">Lưu</button>
                </div>
            </form>
        </div>

    </div>

</body>

</html>