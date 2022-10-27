<?php

function checkRegistrationRules($UsersCredentials){
$validUsernames=[];
foreach($UsersCredentials as $user){

	if (strlen($user[0])>=4 && $user[0]!="admin" && $user[0]!="quera")
		if(strlen($user[1])>=6 && preg_match("/[A-Z]/i", $user[1]))
			$validUsernames[]=$user[0];

	

}
return $validUsernames;		
}

$credentials = [
    ['username', 'password'],
    ['sadegh', 'He3@lsa'],
    ['saeed', '1234567'],
    ['ab', 'afj$L12'],
    ['mehdinickz',"456789asd"]
];
print_r(checkRegistrationRules($credentials));

?>