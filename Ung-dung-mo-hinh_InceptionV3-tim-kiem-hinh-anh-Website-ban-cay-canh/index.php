<?php
    include 'connect.php';
      
    $sql = "SELECT * FROM san_pham LEFT JOIN hinh_anh ON  hinh_anh.ma_san_pham = san_pham.ma_san_pham";
    $sanpham = mysqli_query($connect,$sql);

    function convert_name($str) {
		$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
		$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
		$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
		$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
		$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
		$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
		$str = preg_replace("/(đ)/", 'd', $str);
		$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
		$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
		$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
		$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
		$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
		$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
		$str = preg_replace("/(Đ)/", 'D', $str);
		$str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
		$str = preg_replace("/( )/", '', $str);
		return $str;
	}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- thư viện bootstrap -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css\thongbao.css">

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <title>Shop cây cảnh</title>

</head>

<body>
    <div class="container">
        <?php require_once 'menu.php'; ?>
    </div>
    <!---->
    <div class="container">
        <div id = "alertdiv"></div>

        <div class="container">
            <div class="row">
                <div class="col">
                    <center>
                        <h4 style="color:green; margin-top: 50px;">DANH SÁCH SẢN PHẨM</h4>
                    </center>
                    <div class="container" style="boder: 1px;">
                        <div class="row">
                            <!---->
                            <?php while($value =  mysqli_fetch_array($sanpham)): ?>
                            <div class="col col-lg-3 mt-3">
                                <!---->
                                <div class="card">
                                    <center><a
                                        <?php
                                            $folder = $value['ten_san_pham'];
                                            $folder = convert_name($folder) ;
                                            // echo($folder);
                                            // $folder_path = strtolower(substr($folder, 0, -1));
                                        ?>
                                            href="chitietcc.php?chitiet=<?php $intval = (int)$value['ma_san_pham']; echo $intval; ?>">
                                            <img src="QUAN_LY/upload_image/<?=$folder."/".$value['ten_hinh']?>.jpg"
                                                alt="image" style="width: 193px;height:257px"></a></center>

                                    <div class="card-body">
                                        <center>
                                            <strong>
                                                <h5 class="card-title" style="color:blue">
                                                    <?php echo $value['ten_san_pham'] ?></h5>
                                            </strong>
                                            <strong>
                                                <h6 class=" center card-text mt-2 mb-5" style="color:red">
                                                    <?php echo number_format($value['gia_tien']);?> đ</h6>
                                            </strong>
                                            <a  href="giohang.php?id=<?php $intval = (int)$value['ma_san_pham']; echo $intval; ?>">
                                                <button class="btn btn-success mt-1 mb-1" onclick="tempAlert('Closed',3000)"
                                                    style="color:white; font:boder;">Thêm vào giỏ
                                                    hàng
                                                </button></a>
                                            <a
                                                href="chitietcc.php?chitiet=<?php $intval = (int)$value['ma_san_pham']; echo $intval; ?>">
                                                <button type="button" class="btn btn-info"
                                                    style="color:white; font:boder;">Chi
                                                    tiết</button></a>
                                        </center>

                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" style="padding:15px">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="image/slide3.png" alt="Third slide"
                            style="width: 900px;height: 500px;">
                    </div>
                    <div class="carousel-item ">

                        <img class="d-block w-100" src="image/slide1.jpg" alt="First slide"
                            style="width: 900px;height: 500px;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="image/slide2.jpg" alt="Second slide"
                            style="width: 900px;height: 500px;">
                    </div>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>


        <!-- footer -->
        <div class="container">
            <?php require_once "footer.php"; ?>
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
</script>
<script src="js/giohang.js"></script>


</html>