<?php
function fileName($address,$name){
return $address."/".$name;
}

function directoryName($address,$name){
	$address = (trim($address)=="")?".":$address;
	return $address."/".$name;
}
//------------------------------------------------------------------------
function createFile($name, $address){
	$filename= fileName($address,$name);
	if(!file_exists($filename))
		fopen($filename,"w");
}	

createFile('file2.txt', 'test');
//------------------------
function createDirectory($name, $address){
	$dirName = directoryName($address,$name);
	if(!is_dir($address)){
		mkdir($address);
	}
	if(!is_dir($dirName)){
		mkdir($dirName,0777,true);
	}
}

createDirectory('test2/jk', 'test/test5');
//--------------------

function getFile($name, $address){
$fileString="";
$filename= fileName($address,$name);
	if(file_exists($filename))
		$fileString= file_get_contents($filename);
	return $fileString;
}


//---------------
function editFile($name, $address, $content){
	$filename= fileName($address,$name);
	if(file_exists($filename))
		file_put_contents($filename,$content);
	
}

//---------------
function moveFile($from, $to){
	if(strpos($from,".")!==0 ){
		$from=".".$from;
	}
	if(strpos($to,".")!==0 ){
		$to=".".$to;
	}
	$lastSlashPosition=strrpos($to, "/");
	$directory=substr($to,0,$lastSlashPosition);
	if(file_exists($from)){
		if(!is_dir($directory)){
			mkdir($directory);
		}
		if(!file_exists($to)){
	rename($from, $to);
	}		
}
}

moveFile('test/file2.txt', 'test/file6.txt');

//---------------
function copyFile($from, $to){
	
	$lastSlashPosition=strrpos($to, "/");
	$directory=substr($to,0,$lastSlashPosition);
	if(file_exists($from)){
		if(!is_dir($directory)){
			mkdir($directory);
		}
	copy($from, $to);		
}
}

//---------------
function deleteFile($name, $address){
	$filename= fileName($address,$name);
	if(file_exists($filename))
		unlink($filename);
}

//deleteFile("b",".");


//---------------
function deleteDirectory($address){
	if(strpos($address,".")!==0 ){
		$address="./".$address;
	}
if(is_dir($address)){
$directory = new RecursiveDirectoryIterator($address,4096);
$files = new RecursiveIteratorIterator($directory,2); //child::first returns the files in subfolders first then the subfolders too
foreach ($files as $fileAsObject) {

	
	if(is_dir($fileAsObject)){
		rmdir($fileAsObject->getRealPath());
	}else{
		unlink($fileAsObject->getRealPath());
	}

}

rmdir($address);
}
		
}
//deleteDirectory('f/sdd');

//---------------

function listDirectory($address){
	$list=[];
	$subDirFlag=False;
	if(strpos($address,"/")===0 ){
		$address=".".$address;
		$subDirFlag=True;
	}
	if(strpos($address,"/")===1){
		$subDirFlag=True;
	}
	if(file_exists($address)){
	$list= scandir($address);
	array_shift($list);
	if(!$subDirFlag)
		array_shift($list);
	$dirs=[];
	$files=[];
	foreach ($list as $name) {
			if (is_file("./".$name))
				$files[]=$name;
			else
				$dirs[]=$name;
		}	
	sort($dirs);
	sort($files);
	$list= array_merge($dirs,$files);

}
return $list;
}

//print_r(listDirectory("./f"));
//---------------
function searchFile($name, $address){
$result=[];
	if(strpos($address,".")!==0 ){
		$address="./".$address;
	}
if(is_dir($address)){

	$directory = new RecursiveDirectoryIterator($address,256);
$files = new RecursiveIteratorIterator($directory,2); //child::first returns the files in subfolders first then the subfolders too
foreach ($files as $key=>$fileAsObject) {
echo "key:$key|key type is".gettype($key)."|".$fileAsObject."(type:".gettype($fileAsObject).")<br>";
	echo $fileAsObject->getRealPath()."<hr>";
	if(is_file($fileAsObject)){
		if($key==$name)
			$result[]= (string)$fileAsObject;
	}
}
}
return $result;
}
//var_dump(searchFile("6.txt","gh"));
?>