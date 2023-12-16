<html>
<head>
 <link rel='stylesheet' href='styleDodaj.css'>
</head>
<body>
 <form action='register.php' method='post'>
  <input type='text' name='nick' placeholder='nick'>
  <input type='email' name='mail' placeholder='mail'>
  <input type='password' name='pass' placeholder='haslo'>
  <input type='submit' value='zarejestruj'>
 </form>
<?php
include("templates/header.php");
include("templates/elementy.php");
setStyle('styleDodaj.css');
  if(isset($_POST["nick"]) && isset($_POST["mail"]) && isset($_POST["pass"]))
  {
    $nick=$_POST["nick"];
    $mail=$_POST["mail"];
    $pass=sha1(sha1($_POST["pass"]));
    
    mysqli_query($link,"Insert into users(nick,email,pass) values('$nick','$mail','$pass');");
  }
  include("templates/footer.php");

?>
<a href='zaloguj.php'>Zaloguj sie</a>
</body>
</html>
