<?php

function encrypt($str){
	
	$splittedChars = str_split($str);
	$encryptedString="";
	$i=1;
	foreach ($splittedChars as $key => $char) {
		if (ctype_alpha($char)){
			$weight = ord($char)-96;
			if($key>0){
			if(ord($splittedChars[$key-1])===ord($char)){
				$i++;
			}else{
				$i=1;
			}
		}
		$encryptedString .= $weight*$i;	
		}else{
			$encryptedString .= $char;	
		}

	}

return $encryptedString;
}




function isSocialAccountInfo($str){
    if(preg_match("/^[A-Z].*/",$str)){
        $str=lcfirst($str);
return (preg_match("/^(?<CPAS>[a-z]*):www.(\k<CPAS>).([a-z0-9]*)\/([a-z]*)$/", $str)===0)? False:True;
}else{
    return false;
}
}

//(^[A-Z][A-Za-z]):www.([A-Za-z]*).([a-z0-9]*)\/([a-z]*)
var_dump(isSocialAccountInfo("Twitter:www.twitter.com/javalover"));

//preg_match_all("/^(?<CPAS>[a-z]*):www.(\k<CPAS>).([a-z0-9]*)\/([a-z]*)$/", "twitter:www.twitter.com/javalover",$mm);

//var_dump($mm);




//var_dump(secure("FirstName:Ali, LastName:Alavi, BirthDate:1990/02/02 Gender:male Instagram:www.instagram.com/aalavi Degree:Master Twitter:www.twiter.com/alaviii imdb:www.imdb.com/alavi"));

echo "<hr>";

//var_dump("FirstName:Ali, LastName:Alavi, BirthDate:1990/02/02 Gender:male Instagram:www.instagram.com/12121229 Degree:Master Twitter:www.twiter.com/11212291827 imdb:www.imdb.com/alavi");
?>