<?php
define('DB_HOST', 'localhost');
define('DB_USER_ROOT', 'root');
define('DB_PASS_ROOT', '');
define('DB_NAME', 'DB_cotrollo');
define('INSTALL_FLAG_FILE', 'install_completed.flag');

echo "<h1>Installazione...</h1>";

$conn = mysqli_connect(DB_HOST, DB_USER_ROOT, DB_PASS_ROOT);

if (!$conn) {
    die("Errore Connessione MySQL: " . mysqli_connect_error());
}
echo "<p>Connesso a MySQL.</p>";

$sql_create_db = "CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "`";
if (!mysqli_query($conn, $sql_create_db)) {
    die("Errore Creazione DB: " . mysqli_error($conn));
}
echo "<p>Database verificato/creato.</p>";

mysqli_close($conn);
$conn = mysqli_connect(DB_HOST, DB_USER_ROOT, DB_PASS_ROOT, DB_NAME);

if (!$conn) {
    die("Errore Connessione al DB '" . DB_NAME . "': " . mysqli_connect_error());
}
echo "<p>Connesso al DB specifico.</p>";

$sql_create_table = "
CREATE TABLE IF NOT EXISTS `elementi` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(100) NOT NULL
) ENGINE=InnoDB;
";

if (!mysqli_query($conn, $sql_create_table)) {
     die("Errore Creazione Tabella: " . mysqli_error($conn));
}
echo "<p>Tabella 'elementi' verificata/creata.</p>";


if (!file_put_contents(INSTALL_FLAG_FILE, 'OK')) {
     die("Errore Creazione File Flag. Controlla permessi.");
}
echo "<p>File flag creato.</p>";

mysqli_close($conn);

echo "<hr>";
echo "<h2>Installazione Completata!</h2>";
echo '<p><a href="index.php">Vai alla Home Page</a></p>';

?>