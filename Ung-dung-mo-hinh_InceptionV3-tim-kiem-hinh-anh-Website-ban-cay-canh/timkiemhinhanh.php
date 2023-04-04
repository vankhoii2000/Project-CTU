<?php

    include 'connect.php';


    if(isset($_POST['linkImage'])){
        $linkImage = $_POST['linkImage'];
        $timkiem = explode(",", $linkImage);

        $value_cosine = $_POST['valueImage'];
        $value_cosine = explode(",", $value_cosine);

        if (count($timkiem) > 4){
            $sql = "SELECT * FROM SAN_PHAM AS SP, HINH_ANH AS HA WHERE SP.MA_SAN_PHAM = HA.MA_SAN_PHAM AND HA.TEN_HINH  
                    IN ('{$timkiem[0]}','{$timkiem[1]}','{$timkiem[2]}','{$timkiem[3]}','{$timkiem[4]}','{$timkiem[5]}','{$timkiem[6]}','{$timkiem[7]}','{$timkiem[8]}','{$timkiem[9]}')";
            $sanpham = mysqli_query($connect,$sql);
        }else{
            $timkiem1 = $timkiem[0];
            $sql = "SELECT * FROM SAN_PHAM AS SP, HINH_ANH AS HA WHERE SP.MA_SAN_PHAM = HA.MA_SAN_PHAM AND HA.TEN_HINH  IN ('{$timkiem[0]}')";
            $sanpham = mysqli_query($connect,$sql);
        };
            
        $name = $_POST['namePlant'];
        // print_r($name);
        $sql1 = "SELECT * FROM SAN_PHAM AS SP, HINH_ANH AS HA WHERE SP.MA_SAN_PHAM = HA.MA_SAN_PHAM AND SP.TEN_SAN_PHAM LIKE '%$name%'";
        $all_sanpham = mysqli_query($connect,$sql1);

    }
    
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
    


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css\thongbao.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <title>Phân loại</title>
</head>


<script>
$(document).ready(function() {

    $("#imageSubmit").click(function(e) {
        e.preventDefault();

        var form_data = new FormData();
        var img = $("#imageName")[0].files;

        if (img.length > 0) {
            form_data.append('my_image', img[0]);

            $.ajax({
                url: "http://127.0.0.1:5000/api/predict",
                type: "POST",
                data: form_data,
                contentType: false,
                processData: false,
                dataType: 'JSON',
                success: function(result) {
                    var path = "./static/uploads/" + result.file_name;
                    $("#imgShow").attr("src", path);

                    $("#namePlant").text(result.name);
                    $("#namePlant").val(result.name);
                    $("#linkImage").val(result.link_image);
                    $("#valueImage").val(result.value_image);
                    // console.log(result);
                    $("#imageForm").submit();


                    // console.log(result.link_image);

                }
            });

        } else {
            $("#errorTxt").text("Please select a image!");
        }

    });


});
</script>


<body>
    <!-- MENU -->
    <div class="container">
        <?php require_once 'menu.php'; ?>
    </div>

    <!-- UPLOAD IMAGE  -->
    <center>
        <div class="container mt-5">
            <!-- <div>
                <img id="imgShow" src="./image/image_default.jpg" style="height: 150px; width: 150px;">
            </div> -->
            <hr>
            <form id="imageForm" method="POST" action="" enctype="multipart/form-data">
                <input type="file" name="file" id="imageName" class="form-control">
                <input type="hidden" name="namePlant" id="namePlant">
                <input type="hidden" name="linkImage" id="linkImage">
                <input type="hidden" name="valueImage" id="valueImage">
                <button class="btn btn-success" type="submit" id="imageSubmit">Tìm kiếm</button>
            </form>
            <hr>
    </center>
    <div class="container">
        <div class="row">
            <?php if(isset($_POST['linkImage'])){?>
            <?php  $i = 0; ?>
            <?php while($value =  mysqli_fetch_array($sanpham)): ?>
            <div class="col col-lg-3 mt-3">
                <div class="card">
                    <center>  
                    <progress max="100" value="<?=$value_cosine[$i]*100?>"></progress>
                    <p value="<?=$value_cosine[$i]*100?>"></p>
                                <a <?php
                                    $folder = $value['ten_san_pham'];
                                    // var_dump($folder);
                                    $folder = convert_name($folder) ;
                                    // $folder_path = strtolower(substr($folder, 0, -1));
                                ?>
                            
                            href="chitietcc.php?chitiet=<?php $intval = (int)$value['ma_san_pham']; echo $intval; ?>">
                            <img src="QUAN_LY/upload_image/<?=$folder."/".$value['ten_hinh']?>.jpg" alt="image"
                                style="width: 193px;height:257px"></a></center>

                    <div class="card-body">
                        <center>
                            <strong>
                                <h5 class="card-title" style="color:blue"><?php echo $value['ten_san_pham'] ?></h5>
                            </strong>
                            <strong>
                                <h6 class=" center card-text mt-2 mb-5" style="color:red">
                                    <?php echo number_format($value['gia_tien']);?> đ</h5>
                            </strong>
                            <a href="giohang.php?id=<?php echo $value['ma_san_pham'] ?>">
                                <button type="button" class="btn btn-success mt-1 mb-1"
                                    style="color:white; font:boder;">Thêm vào giỏ hàng
                                </button></a>
                            <a
                                href="chitietcc.php?chitiet=<?php $intval = (int)$value['ma_san_pham']; echo $intval; ?>">
                                <button type="button" class="btn btn-info" style="color:white; font:boder;">Chi
                                    tiết</button></a>
                        </center>

                    </div>
                </div>
            </div>
            <?php 
                $i = $i + 1;
                endwhile; ?>


            <hr>   
            <h2>KẾT QUẢ CÙNG TÊN</h2>
            <hr>
            <div class="row">
                <?php while($value1 =  mysqli_fetch_array($all_sanpham)): ?>
                <div class="col col-lg-3 mt-3">
                    <div class="card">
                        <center><a <?php
                                    $folder = $value1['ten_san_pham'];
                                    $folder = convert_name($folder) ;
                                    // $folder_path = strtolower(substr($folder, 0, -1));
                                ?>
                                href="chitietcc.php?chitiet=<?php $intval = (int)$value1['ma_san_pham']; echo $intval; ?>">
                                <img src="QUAN_LY/upload_image/<?=$folder."/".$value1['ten_hinh']?>.jpg"
                                    alt="image" style="width: 193px;height:257px"></a></center>

                        <div class="card-body">
                            <center>
                                <strong>
                                    <h5 class="card-title" style="color:blue"><?php echo $value1['ten_san_pham'] ?></h5>
                                </strong>
                                <strong>
                                    <h6 class=" center card-text mt-2 mb-5" style="color:red">
                                        <?php echo number_format($value1['gia_tien']);?> đ</h5>
                                </strong>
                                <a href="giohang.php?id=<?php echo $value1['ma_san_pham'] ?>">
                                    <button type="button" class="btn btn-success mt-1 mb-1"
                                        style="color:white; font:boder;">Thêm
                                        vào giỏ hàng
                                    </button></a>
                                <a
                                    href="chitietcc.php?chitiet=<?php $intval = (int)$value1['ma_san_pham']; echo $intval; ?>">
                                    <button type="button" class="btn btn-info" style="color:white; font:boder;">Chi
                                        tiết</button></a>
                            </center>

                        </div>
                    </div>
                </div>
                <?php endwhile; ?>

            </div>
            <?php }else{?>
            <div>
                <center>
                    <h2>VUI LÒNG TẢI HÌNH ẢNH ĐỂ THỰC HIỆN TÌM KIẾM</h2>
                </center>

            </div>
            <?php };?>
        </div>

    </div>

    <?php require_once "footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <script src="js/giohang.js"></script>


</body>

</html>