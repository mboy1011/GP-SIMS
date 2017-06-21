<?php
$servername = "localhost";
$username = "root";
$password = "root@kali~$";
$database = "db_golden_pharma";

// Create connection
$db = new mysqli($servername, $username, $password, $database);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 
?>