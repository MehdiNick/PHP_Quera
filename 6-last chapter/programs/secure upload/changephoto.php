<?php

if (!isset($_FILES['photo'])){
    die('No photo!');
}


$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime = finfo_file($finfo, $_FILES['photo']['tmp_name']);
finfo_close($finfo);
if ($mime != 'image/png'  && $mime != 'image/jpeg'&& $mime != 'image/jpg') {
    die('Invalid photo!');
}
$filename = basename($_FILES['photo']['name']);
//print_r($_FILES['photo']);
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if (strtolower($ext) != 'png' && strtolower($ext) != 'jpeg' && strtolower($ext) != 'jpg') {
    die('Invalid photo!');
}

if ($_FILES['photo']['size'] > 500000 || filesize( $_FILES['photo']['tmp_name'])>500000) {
    die('Photo is too big!');
}



$filename = hash_file('sha256', $_FILES['photo']['tmp_name']) . '.' . $ext;

$uploaddir = './ ';
$uploadfile = $uploaddir . basename($filename);
if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
    echo "Photo changed successfully!";
} else {
  //  echo "Error!";
}


?>