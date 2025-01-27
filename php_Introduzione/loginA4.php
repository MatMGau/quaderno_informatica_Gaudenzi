<?php
// Creazione di un array di credenziali
$credentials = [

    // (chiave) username => (valore) password
    'user' => 'pass' 
];

$username = $_REQUEST['username'];
$passwd = $_REQUEST['password'];

echo "Username: $username<br />";
echo "Password: $passwd<br />";

// Verifica delle credenziali usando l'array
if (isset($credentials[$username]) && $credentials[$username] === $passwd) {
    $msg = "Benvenuto $username nella pagina riservata del sito";
} else {
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
<br>
  <a href="phpA4.html" class="button"> <--- go back</a>
</body>
</html>