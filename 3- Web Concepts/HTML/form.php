<?php
if(isset($_POST["name"])){
$name= $_POST["name"];
if(preg_match("/[a-z ]{3,}/i", $name)){
	echo <<<eyjoon
  <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Say HI</title>
  </head>
  <body>
      <h1>Say my name!</h1>
      Hello $name
  </body>
</html>
eyjoon;
}else{

echo <<<sheytoon
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Say HI</title>
  </head>
  <body>
      <h1>Say my name!</h1>
      <form method="post" action="form.php">
          <input type="text" name="name">
          <span style="color: red">invalid name</span>
          <input type="submit" value="Say it!">
      </form>
  </body>
</html>
sheytoon;
}

}else{
	echo <<<joon
	<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Say HI</title>
  </head>
  <body>
      <h1>Say my name!</h1>
      <form method="post" action="form.php">
          <input type="text" name="name">
          <input type="submit" value="Say it!">
      </form>
  </body>
</html>
joon;

}

?>