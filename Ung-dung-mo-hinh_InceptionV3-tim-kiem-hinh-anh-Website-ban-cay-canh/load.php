<?php

  $filename = $_POST['filename'];

  $target_directory = "static/";
  $target_file = $target_directory.basename($_FILES["file"]["name"]);   //name is to get the file name of uploaded file
  $filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $newfilename = $target_directory.$filename.".".$filetype;


  if(move_uploaded_file($_FILES["file"]["tmp_name"],$newfilename)) echo 1;
  else echo 0;


 ?>