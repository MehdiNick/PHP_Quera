<?php
 $s=password_hash("12523456", PASSWORD_DEFAULT);
echo $s;
//var_dump(password_verify("123456", $s));
?>