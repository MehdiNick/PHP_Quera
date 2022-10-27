<?php

echo readfile("j.txt"); // reads the whole file.

//readfile("1.jpg"); // not used in this way / it outputs odd characters 
$file_handle = fopen("j.txt","r+") or die("Couldn't open the file");
echo "<br>";
echo fread($file_handle,filesize("j.txt")); // it reads the whole file 
echo "<br>";
echo fread($file_handle,5);// it doesn't print anything because the file pointer is at the last character so there isn't any more character

rewind($file_handle);
echo fread($file_handle,5); // it reads the first five characters of this file.
echo"<br>";
echo fgets($file_handle); // it reads the current line of that file and since the pointer is at 5, it reads the first line starting from the sixth character
echo "<br>";
while (!feof($file_handle)) { // it checks if we've reached the end of the file, if yes it returns true;
echo fgets($file_handle);
}


rewind($file_handle);
echo "<br>";
echo fgetc($file_handle); // it reads the current character and increase the pointer possition by one

fwrite($file_handle, "this is an added line"); // regarding to r+ mode, it will overwrite the original file from the current pointer position 
echo "<br>";
rewind($file_handle);
echo readfile("j.txt");
echo "<br>";
file_put_contents('j.txt', "salam",FILE_APPEND); // it opens a file and write something in it without a need for a handle
var_dump(file_get_contents('J.txt'));


fclose($file_handle);
?>