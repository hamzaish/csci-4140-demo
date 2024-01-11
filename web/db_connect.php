<?php
$host = 'dpg-cm7a80mdxxxxxxxxxx';
$dbname = 'demo_xxxxxxxx';
$username = 'xxxxxxx';
$password = 'ecMTqrDov1NDxxxxxxxxxxx';

try {
    $conn = new PDO("pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->query('SELECT version()');
    $version = $stmt->fetchColumn();
    echo "<p>Successfully connected to the Database. Version: " . $version . "</p>";

} catch(PDOException $e) {
    echo "<p>Unable to connect to the database: " . $e->getMessage() . "</p>";
}
?>
