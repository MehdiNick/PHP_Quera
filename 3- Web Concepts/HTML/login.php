<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(isset($_POST["email"]) && isset($_POST["password"]) && !empty(($_POST["email"])) && !empty(($_POST["password"]))){
		$email= $_POST["email"];
		$pass = md5($_POST["password"]);
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			if($email==="admin@example.org" && $pass==="fc7d1bcf2447219eb208b96aa3d0a58c")
				echo "welcome admin";
			else
				echo "invalid login";

	}else{
		echo "invalid email format";
		}
	}else{
		echo "invalid login";
	}

}


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>login</title>
  </head>
  <body>
      <h1>Secure Login!</h1>
      <form method="post" action="login.php">
          <input type="text" name="email">
          <input type="password" name="password">
          <input type="submit" value="login">
      </form>
  </body>
</html>