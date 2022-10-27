<?php
function f(){
	static $counter=1;
	if($counter>2){
	throw new Exception("msg1$counter");
}
$counter++;
}



try{

f();
f();
f();
f();
echo "dsds";


}


catch(Exception $m){

	echo "Error Line".$m->GetLine();
}


echo "after";


?>