<?php

$kl = [2,"kir"=>"jk",3];

$serialized = serialize($kl);

echo $serialized;
echo"<hr>\n";
var_dump(unserialize($serialized));


?>