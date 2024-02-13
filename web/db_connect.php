<?php
$host = 'dpg-cn5givuct0pc738fpak0-a';
$dbname = 'csci4140_ass1_db';
$username = 'csci4140_ass1_db_user';
$password = 'bQkIPgppbsgzujNoURv5lqjrHLDv867q';

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
