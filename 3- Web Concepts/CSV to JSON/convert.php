<?php

	if(isset($_FILES["file"])){
$uploadDirectory = "./";
$filename = basename($_FILES["file"]["name"]);
$destinationFile = $uploadDirectory . $filename;
if(move_uploaded_file($_FILES["file"]["tmp_name"], $destinationFile)){
$fileHandle = fopen($destinationFile, "r");
 $firstLine= fgetcsv($fileHandle,0,",",'"');
 $arrayCSV=[];
 if(!empty($firstLine)){


 array_walk($firstLine, function(&$item){
 	$item = trim($item);
 });
$numOfColumnsCSV= count($firstLine);

//print_r($firstLine);

while(($line=fgetcsv($fileHandle,0,",",'"'))!==false){
	//print_r($line);
	$tempArr=[];
	array_walk($line, function (&$item) {
		global $firstLine;
		static $i=0;
		global $tempArr;
		 $keyy=$firstLine[$i];
	//	 echo "tehy key is $keyy <BR>";
		 $item = trim($item);
   $tempArr[$keyy] = $item;
   $i++;
});


///echo "<hr>";
$arrayCSV[]=$tempArr;

}
}
$jsonFormat = json_encode($arrayCSV);
echo $jsonFormat;
}

}else{
	
}






?>