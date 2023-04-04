<?php
      include 'connect.php';
      
      if(isset($_GET['timkiem']))
      {
        $timkiem = $_GET['timkiem']; 
        $sql = "SELECT * FROM san_pham LEFT JOIN hinh_anh ON hinh_anh.ma_san_pham = san_pham.ma_san_pham where `san_pham`.`ten_san_pham` LIKE '%$timkiem%' ";
        $sanpham = mysqli_query($connect,$sql);
      }else{
        $sql = "SELECT * FROM san_pham LEFT JOIN hinh_anh ON  hinh_anh.ma_san_pham = san_pham.ma_san_pham";
        $sanpham = mysqli_query($connect,$sql);
      };

      if(isset($_POST['submit'])){
        $hoten = $_POST['ho_ten'];
        $mail = $_POST['mail'];
        $gioitinh = $_POST['gioi_tinh'];
        $noidung = $_POST['noi_dung'];

        $sql1 = "INSERT INTO `PHAN_HOI_Y_KIEN`(`ho_ten`, `mail`, `gioi_tinh`, `noi_dung`) VALUES ('$hoten','$mail','$gioitinh', '$noidung')";
        $gui = mysqli_query($connect, $sql1);
        
        header("Location: ./lienhe.php");
        exit();
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
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <link rel="stylesheet" type="text/css" href="./map.css" />
    <script type="module" src="./map.js"></script>
    <title>BANCAYCANH</title>
</head>

<body>

    <div class="container">
        <?php require_once 'menu.php'; ?>
    </div>

    <div class="container mt-5">
        <table class="table table-sm table-success">
            <thead>
                <center>
                    <h4 style="color:blue"> <strong>
                            THÔNG TIN CỬA HÀNG
                        </strong></h4>
                </center>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Tên cửa hàng:</th>
                    <td>BANCAYCANH</td>
                </tr>
                <tr>
                    <th scope="row">Địa chỉ:</th>
                    <td>Số 1, đường 3/2, phường Xuân Khánh, quận Ninh Kiều, Thành phố Cần Thơ</td>
                </tr>
                <tr>
                    <th scope="row">Điện thoại</th>
                    <td colspan="2">0963657120</td>
                </tr>
                <tr>
                    <th scope="row">Thời gian mở cửa</th>
                    <td colspan="2">8h - 17h</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="container">
        <center><strong>
                <h4>Địa chỉ google map</h4>
            </strong></center>
    </div>
    <div class="container">
        <center>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.841518408643!2d105.76842661461575!3d10.029933692830687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0895a51d60719%3A0x9d76b0035f6d53d0!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBD4bqnbiBUaMah!5e0!3m2!1svi!2s!4v1664866589154!5m2!1svi!2s"
                width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </center>
    </div>
    <div class="container">
        <form method="POST">
            <div class="form-group">
                <label for="exampleFormControlInput1">Họ và tên</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nguyen Van A" name="ho_ten">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="mail">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Giới tính</label>
                <select class="form-control" id="exampleFormControlSelect1" name="gioi_tinh">
                    <option>Nam</option>
                    <option>Nữ</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Phản hồi ý kiến</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="noi_dung"></textarea>
            </div>
            <button type="submit" class="btn btn-success" name="submit">Gửi</button>
        </form>
    </div>



    <!-- footer -->
    <div class="container">
        <?php require_once "footer.php"; ?>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
</script>

</html>