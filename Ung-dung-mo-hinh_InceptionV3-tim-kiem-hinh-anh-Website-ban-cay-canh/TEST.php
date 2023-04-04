<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Upload image</title>
</head>
<script>
$(document).ready(function() {

    $("#imageSubmit").click(function(e) {
        e.preventDefault();

        let form_data = new FormData();
        let img = $("#imageName")[0].files;

        if (img.length > 0) {
            form_data.append('my_image', img[0]);

            $.ajax({
                url: "API.php",
                type: "POST",
                data: form_data,
                contentType: false,
                processData: false,
                success: function(responce) {
                    const data = JSON.parse(responce);

                    let path = "./static/uploads/"+data.src;
                    $("#imgShow").attr("src", path);
                }
            });

        } else {
            $("#errorTxt").text("Please select a image!");
        }

    });


});
</script>


<body>
    <form id="imageForm" action="" method="post" enctype="multipart/form-data">
        <input type="file" id="imageName">
        <input type="submit" id="imageSubmit" value="Upload">
    </form>
    <p id="errorTxt" style="color:red"></p>

    <div class="imageShow">
        <img src="./image/image_default.jpg" style="height: 150px; width: 150px;" id="imgShow">
    </div>

</body>

</html>