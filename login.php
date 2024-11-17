<?php
//$username = $_POST['nomeutente'];
//$passwd = $_POST['password'];
$username = $_REQUEST['username'];
$passwd = $_REQUEST['password'];

echo "Username: $username<br />";
echo "Password: $passwd<br />";

if($username=="ciao" && $passwd=="ciao") {
  $msg = "Attenzione credenziali non corrette";"Benvenuto $username nella pagina riservata del sito!";
}
 else {
  $msg = "Attenzione credenziali non corrette";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Accesso a pagina riservata</title>
</head>
<body>
  <h3>Pagina di login</h3>
  
  <?=$msg?>

</body>
</html>