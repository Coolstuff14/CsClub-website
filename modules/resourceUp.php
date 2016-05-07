<?php
$target_dir = "uploads/resources/";
$target_file = $target_dir . basename($_FILES["uploadFile"]["name"]);
$uploadOk = 1;
$theFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if pdf file is a actual pdf or fake pdf
$file_type=$_FILES["uploadFile"]['type'];
if ($file_type=="application/pdf"){
  //echo "File is a PDF - " . $file_type . ".";
  $uploadOk = 1;
} else {
  $uploadOk = 0;
}

// Check if file already exists
if (file_exists($target_file)) {
    alertMsg('Sorry, file already exists', 'alert-danger');
    $uploadOk = 0;
}
// Check file size
if ($_FILES["uploadFile"]["size"] > 2000000) {
    alertMsg('Sorry, your file is too large', 'alert-danger');
    //echo $_FILES["uploadFile"]["size"];
    $uploadOk = 0;
}
// Allow certain file formats
if($theFileType != "pdf") {
    alertMsg('Sorry, only PDF files are allowed', 'alert-danger');
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  //alertMsg('Sorry, your file was not uploaded', 'alert-danger');
  // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_file)) {
        //File uploaded
        $link = db_quote($target_file);
        //alertMsg('The file has been uploaded', 'alert-success');
    } else {
        //echo "Sorry, there was an error uploading your file.";
        alertMsg('Sorry, there was an error uploading your file', 'alert-danger');
    }
}
?>
