<?php
include 'connect.php';   

 
if(isset($_GET['timkiem'])){
    $timkiem = $_GET['timkiem'];
}
    $sql = "SELECT * FROM san_pham LEFT JOIN hinh_anh ON hinh_anh.ma_san_pham = san_pham.ma_san_pham where `san_pham`.`ten_san_pham` LIKE '%$timkiem%' ";
    $sanpham = mysqli_query($connect,$sql);


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
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Tìm kiếm</title>
</head>

<body>
    <?php require_once "menu.php"; ?>
    <p class="text-center container-fluid fs-2 mt-3">Tìm kiếm với từ khoá: <?= $timkiem ?></p>

    <div class="container" style="boder: 1px;">
        <div class="row">
            <!---->
            <?php while($value =  mysqli_fetch_array($sanpham)): ?>
            <div class="col col-lg-3 mt-3">
                <div class="card">
                    <center><a
                                <?php
                                    $folder = $value['ten_san_pham'];
                                    $folder = convert_name($folder) ;
                                    // $folder_path = strtolower(substr($folder, 0, -1));
                                ?>
                            href="chitietcc.php?chitiet=<?php $intval = (int)$value['ma_san_pham']; echo $intval; ?>">
                            <img src="QUAN_LY/upload_image/<?=$folder."/".$value['ten_hinh']?>.jpg"
                                                alt="image" style="width: 193px;height:257px"></a></center>

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
            <?php endwhile; ?>
        </div>
    </div>

    <?php require_once "footer.php"; ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
</script>

</html>