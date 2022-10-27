<?php

/*$jsonData = file_get_contents("students.json");
$data = json_decode($jsonData,true);
$newJson=[];
$until= strtotime("2019/10/4");
foreach ($data as $object) {
$studentID =$object["id"];
$bdate = $object["bdate"];
$age= round(($until-strtotime($bdate))/31536000);
$name = ucwords(strtolower($object["name"]));
if(!array_key_exists($studentID, $newJson)){
$newJson["$studentID"]=["bdate"=>"$bdate","name"=>"$name","age"=>"$age"];
}
}

file_put_contents("students_fixed.json", json_encode($newJson));
*/



$File = file_get_contents("students.json");
$data = json_decode($File,true);
$until= strtotime("2019/10/4");
$i=0;
foreach ($data as $object) {	
$studentID =$object["id"];
if(!array_key_exists($studentID, $data)){
$bdate = $object["bdate"];
$age= round(($until-strtotime($bdate))/31536000);
$name = ucwords(strtolower($object["name"]));
echo $age."<br>";
$object["name"]="$name";
$object["age"]="$age";
$data[$studentID]=$data[$i];
}
unset($data[$i]);
$i++;
}

file_put_contents("students_fixed.json", json_encode($data));



?>