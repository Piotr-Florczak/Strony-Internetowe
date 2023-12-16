<?php
session_start();
include("templates/header.php");
include("templates/elementy.php");
?>
<html>
<head>
</head>
<body>
<form action='zaloguj.php' method='post'>
 <input type='text' name='login' placeholder='email lub nick'>
 <input type='password' name='pass' placeholder='haslo'>
 <input type='submit' value='zaloguj'>
</form>
<a href='register.php'>Nie masz konta? Zarejestruj sie</a>

<a href='wyniki.php'>Zobacz wyniki</a>

<a href='dodaj.php'>Dodaj team lub gracza</a>

<?php
  setStyle('styleDodaj.css');
  if(isset($_POST["login"]) && isset($_POST["pass"]))
  {
    include("templates/login.php");
    $login=$_POST["login"];
    $pass=sha1(sha1($_POST["pass"]));
    $ok=mysqli_query($link, "Select * from users where (nick='$login' or email='$login') and (pass='$pass');");
    if(mysqli_num_rows($ok))
    {
      $_SESSION["zalogowany"]=1;
    }else
    {
      echo "niepoprawne dane logowania";
    }
  }
 include("templates/footer.php");
?>

</body>
</html>
