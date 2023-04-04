<?php

    if(isset($_FILES["my_image"]) && $_FILES["my_image"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["my_image"]["name"];
        $filetype = $_FILES["my_image"]["type"];
        $filesize = $_FILES["my_image"]["size"];
        $error    = $_FILES["my_image"]["error"];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Lỗi : Vui lòng chọn đúng định dang file.");
    
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Lỗi : Kích thước file lớn hơn giới hạn cho phép");

        if(in_array($filetype, $allowed)){
            if(file_exists("./static/uploads/" . $filename)){
                $responce = array('mesasge'=> 'Upload file thành công!' ,'src'=> $filename);
                echo json_encode($responce);
                echo $filename . " đã tồn tại";
            } else{
                move_uploaded_file($_FILES["my_image"]["tmp_name"], "./static/uploads/" . $filename);
                $responce = array('message'=> 'Upload file thành công!' ,'src'=> $filename);
                echo json_encode($responce);
                exit();
                echo "Upload file thành công";
            }

        } else{
            echo "Lỗi : Có vấn đề xảy ra khi upload file"; 
        }
    } else{
        echo "Lỗi: " . $error;
    }
    exit()

?>