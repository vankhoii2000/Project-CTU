<?php
    include 'connect-admin.php';
    
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM LOAI_SAN_PHAM WHERE ma_loai = {$id}";
    $result = mysqli_fetch_assoc(mysqli_query($connect,$sql));

    if(isset($_POST['submit'])){
        $maloai = ($_POST['ma_loai']);
        $tenloai = ($_POST['ten_loai']);

        $sql1 = "UPDATE `loai_san_pham` SET `ma_loai`='$maloai',`ten_loai`='$tenloai' WHERE ma_loai=$maloai";
        $result1 = mysqli_query($connect,$sql1);
        
        header("Location: ./themloaisp.php");
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
    <title>Cập nhật</title>

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
            <form action="" method="POST">
                <table class="table table-success">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <th scope="row">Mã loại cây</th>
                            <td>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="ma_loai" placeholder=""
                                        aria-label="" aria-describedby="basic-addon1"
                                        value="<?= $result['ma_loai'] ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Tên loại cây</th>
                            <td>
                            <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="ten_loai" placeholder=""
                                        aria-label="" aria-describedby="basic-addon1"
                                        value="<?= $result['ten_loai'] ?>">
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