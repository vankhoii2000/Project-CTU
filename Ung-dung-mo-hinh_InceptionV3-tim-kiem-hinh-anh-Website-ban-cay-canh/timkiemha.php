<?php
    include 'connect.php';

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css\thongbao.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <title>Tìm kiếm bằng hình ảnh</title>
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

                    var data1 = JSON.stringify(result);
                    var data_json = JSON.parse(data1);
                    console.log(data_json);

                    var path = "./static/uploads/" + result.file_name;
                    $("#imgShow").attr("src", path);
                    var name = $("#name").val(result.file_name);

                    $.post("./\\\\.php", {name:name},);

                }
            });

        } else {
            $("#errorTxt").text("Please select a image!");
        }

    });


});
</script>

<body>
    <!-- Menu -->
    <div class="container">
        <?php require_once 'menu.php'; ?>
    </div>
    <center>
        <div class="container mt-5">
            <div>
                <img id="imgShow" src="./image/image_default.jpg" style="height: 150px; width: 150px;">
                <p id="name"></p>
            </div>

            <hr>
            <form id="imageForm" method="POST" action="" enctype="multipart/form-data">
                <input type="file" name="file" id="imageName" class="form-control">
                <input type="hidden" name="namePlant" id="namePlant">
                <button class="btn btn-success" type="submit" id="imageSubmit">Tìm kiếm</button>
            </form>
            <p id = "test"></p>
            <hr>
        </div>
    </center>


    <div>
        <h3 style="color:green">
            <center><strong>Kết quả tìm kiếm</strong></center>
        </h3>
        </div>


        </div>



        <?php require_once "footer.php"; ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
        </script>
        <script src="js/giohang.js"></script>

</body>

</html>