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
    error_log("Successfully connected to the Database.");

} catch(PDOException $e) {
    error_log("<p>Unable to connect to the database");
}

try {
    $sql = "CREATE TABLE IF NOT EXISTS MyUsers(id INT PRIMARY KEY,
    name VARCHAR NOT NULL, passwords VARCHAR, reg_date TIMESTAMP);";
    $conn->exec($sql);
} catch(PDOException $e) {
    error_log("Couldn't create table");
}

?>
