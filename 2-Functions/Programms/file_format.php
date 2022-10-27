<?php

function getExtension($text){
$dot= strrpos($text,".");
return $dot==false?"":substr($text, $dot+1);
}

echo getExtension('/home/quera/sample_file.txt'); // txt
echo getExtension('https://domain.com/file.mp3'); // mp3
echo getExtension('/no/file/extension'); // '' (empty string)

?>