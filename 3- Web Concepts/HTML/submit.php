<?PHP
if(isset($_POST["name"])){
	echo "Hello"." ".ucfirst(strtolower($_POST["name"]))."!";
}


?>