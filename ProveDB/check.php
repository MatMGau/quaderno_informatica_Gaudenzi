<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('INSTALL_FLAG_FILE', 'install_completed.flag');

if (file_exists(INSTALL_FLAG_FILE)) {
    header('Location: index.php');
    exit;
} else {
    echo "<h1>Setup Richiesto</h1>";
    echo '<p><a href="install.php">Installa Ora</a></p>';
}
?>