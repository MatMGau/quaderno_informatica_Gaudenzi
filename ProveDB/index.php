<?php
define('INSTALL_FLAG_FILE', 'install_completed.flag');
if (!file_exists(INSTALL_FLAG_FILE)) {
    header('Location: setup_check.php');
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
</head>
<body>
    <h1>Benvenuto!</h1>
    <p>Il sito è pronto.</p>

</body>
</html>