<?php

function generateCsrfToken()
{
    session_start();
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

    }
    $token = $_SESSION['csrf_token'];
    return $token;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Change E-mail address</title>
</head>
<body>
  <form method="post" action="changemail.php">
    <input type="email" id="email" name="email">
      <input type="hidden" name="csrf_token" value="<?php   echo generateCsrfToken();?>" >
    <input type="submit" name="submit" value="Change E-mail address">
  </form>
</body>
</html>