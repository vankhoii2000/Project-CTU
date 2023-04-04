<?php
    include 'connect.php';

    if(isset($_GET['chitiet'])){
        $id = intval($_GET['chitiet']);
        $sql = "SELECT * FROM san_pham WHERE ma_san_pham = {$id}";
        $sql1 = "SELECT * FROM hinh_anh WHERE ma_san_pham = {$id}";
        $sql2 = "SELECT * FROM san_pham LEFT JOIN hinh_anh ON  hinh_anh.ma_san_pham = san_pham.ma_san_pham where san_pham.ma_san_pham != {$id}";
        
        $query = mysqli_query($connect,$sql);
        $query1 = mysqli_query($connect,$sql1);
        $danhsach = mysqli_query($connect,$sql2);

        $sanpham = mysqli_fetch_assoc($query);  
        $hinhanh = mysqli_fetch_assoc($query1);

    }


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


<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Chi tiet</title>
    <link rel="stylesheet" type="text/css" href="css/chitietcc.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css\thongbao.css">
</head>

<body>
    <div class="container">
        <?php include 'menu.php'; ?>
    </div>
    <div class="container">
        <div id="alertdiv"></div>

        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-4">

                        <div class="preview-pic tab-content">
                            <?php
                            $folder = $sanpham['ten_san_pham'];
                            $folder = convert_name($folder) ;
                            // $folder_path = strtolower(substr($folder, 0, -1));
                            ?>
                            <div class="tab-pane active" id="pic-4"><img
                                    src="QUAN_LY/upload_image/<?=$folder."/".$hinhanh['ten_hinh']?>.jpg" /></div>
                        </div>

                    </div>
                    <div class="details col-md-6">
                        <h4 class="product-title"><?php echo $sanpham['ten_san_pham'] ?></h4>
                        <div class="rating">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                        <?php
                            $dacdiem = $sanpham['dac_diem'];;
                            $mota = substr($dacdiem, 0, strlen($dacdiem)/2.14);
                        ?>
                        <p class="product-description"><?php echo $mota; ?><strong>...</strong></p>
                        <h4 class="" style="color:red"><span><?php echo number_format($sanpham['gia_tien'] )?>đ</span>
                        </h4>
                        <h5 style="color:blue"><span>Còn lại: <?php echo number_format($sanpham['so_luong'] )?></span>
                        </h5>
                        <div class="action">
                            <a href="giohang.php?id=<?=$id?>">
                                <button class="btn btn-success mt-1 mb-1" onclick="tempAlert('Closed',3000)"
                                    style="color:white; font:boder;">Thêm vào giỏ
                                    hàng
                                </button></a>
                            <a href="view-giohang.php">
                                <button type="button" class="btn btn-danger mt-1 mb-1"
                                    style="color:white; font:boder;">Thanh toán
                                </button></a>
                        </div>
                        <div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div></div>
    <div class="container mt-5">
        <center>
            <h2>MÔ TẢ CHI TIẾT</h2>
        </center>
    </div>
    <div class="container">
        <center>
            <?php $link = $hinhanh['video_mota']?>
            <iframe width="100%" height="400px" src="https://www.youtube.com/embed/<?php echo$link?>"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </center>
    </div>
    <div class="container">
        <div class="card">
            <strong>ĐẶC ĐIỂM</strong>
            <p class="product-description"><?php echo $sanpham['dac_diem'] ?></p>
            <STRONg>CÔNG DỤNG</STRONg>
            <p class="product-description"><?php echo $sanpham['cong_dung'] ?></p>
        </div>
    </div>
    <!-- COMMENT SẢN PHẨM -->
    <div class="container"><?php include 'binhluan.php'; ?></div>
    <!-- COMMENT FACEBOOK -->
    <div class="container">
        <h3><strong>Bình luận facebook</strong></h3>
        <center>
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous"
                src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0" nonce="WyMOjuLF"></script>

            <div class="fb-comments" data-href="http://localhost/luanvan" data-width="800" data-numposts="5"></div>
        </center>
    </div>

    <!-- CÁC CÂY CẢNH KHÁC -->
    <div class="container">
        <div id="alertdiv"></div>
        <div class="container mt-5">
            <h4 style="color:green"><strong>CÁC CÂY CẢNH KHÁC</strong></h4>
        </div>
        <div class="row">
            <?php while($value1 =  mysqli_fetch_array($danhsach)): ?>
            <div class="col col-lg-3 ">

                <div class="card" style="padding:5px">
                    <center><a <?php
                            $folder = $value1['ten_san_pham'];
                            $folder = convert_name($folder) ;
                            // $folder_path = strtolower(substr($folder, 0, -1));
                        ?> href="chitietcc.php?chitiet=<?php $intval = (int)$value1['ma_san_pham']; echo $intval; ?>">
                            <img src="QUAN_LY/upload_image/<?=$folder."/".$value1['ten_hinh']?>.jpg" alt="image"
                                style="width: auto;height:257px"></a></center>

                    <div class="card-body">
                        <center><strong>
                                <h5 class="card-title" style="color:blue">
                                    <?php echo $value1['ten_san_pham'] ?></h5>
                            </strong>
                            <strong>
                                <h6 class=" center card-text mt-2 mb-5" style="color:red">
                                    <?php echo number_format($value1['gia_tien']);?> đ</h5>
                            </strong>
                            <a href="giohang.php?id=<?php echo $value1['ma_san_pham'] ?>">
                                <button type="button" class="btn btn-success mt-1 mb-1"
                                    style="color:white; font:boder;">Thêm vào giỏ
                                    hàng
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
    </div>

    <?php require_once "footer.php"; ?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
</script>
<script src="js/giohang.js"></script>

</html>