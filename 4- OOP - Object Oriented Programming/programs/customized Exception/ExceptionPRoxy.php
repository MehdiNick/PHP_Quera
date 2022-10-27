<?php

class ExceptionProxy extends Exception {public $function; public $message;}




function transformExceptions($functions)
{
	$transformed_exceptions=[];

    	foreach ($functions as $function) {

    		    try{
    		$function();
    		$newExcp= new ExceptionProxy("ok!");
    		$newExcp->function = $function;
    		$newExcp->message = $newExcp->getMessage();
    		$transformed_exceptions[] = $newExcp;
					}

catch(Exception $e){
$newExcp= new ExceptionProxy($e->getMessage());
    		$newExcp->function = $function;
    	$newExcp->message = $newExcp->getMessage();
    		$transformed_exceptions[] = $newExcp;
    }

    	}
  
    return $transformed_exceptions;
}

function f()
{
    Throw new Exception("Error message!");
}

function g()
{
    return;
}

$transformed_exceptions = transformExceptions(["f", "g"]);

foreach ($transformed_exceptions as $transformed_exception) {
    echo "Function name: "
         . $transformed_exception->function
         . "\nMessage: "
         . $transformed_exception->message
         . "\n";
}



?>