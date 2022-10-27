<?php
$handle = opendir("./gh");
//var_dump(readdir($handle));

while (false !== ($entry = readdir($handle))) {
        echo "$entry<br>";
    }


var_dump(glob("*"));
?>