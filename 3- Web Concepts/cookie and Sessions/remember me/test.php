<?php
$correctPassword = '$2y$12$QA4jECOvzKzihF.gc7a/dODm03OYOl3PPfnsUYFwRj1N6vwxgXEt2';
$correctPassword1 = password_hash("quera!@#$%2020", PASSWORD_ARGON2I);


$options1 = [
	'salt'=>"jksuioiaposidojhasdasd654a6sda987sd98s",
	'cost'=>5];
echo $j=password_hash("quera!@#$%2020", PASSWORD_DEFAULT,$options1);
echo "<hr>";
$options2 = [
	'salt'=>"jksuioiaposidojhasdasd654a6sda987sd98s",
	'cost'=>6];



	
echo $k=password_hash("quera!@#$%2020", PASSWORD_DEFAULT,$options2);
echo "<hr>";
echo $m=password_hash("quera!@#$%2020", PASSWORD_DEFAULT);
echo "<hr>";



var_dump(password_verify("quera!@#$%2020", $j));
echo "<br>";


var_dump(password_verify("quera!@#$%2020", $k));
echo "<br>";


var_dump(password_verify("quera!@#$%2020", $m));
echo "<br>";


?>