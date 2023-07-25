<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fatima";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("<h2>Échec de la connexion BD: " . $conn->connect_error . "</h2><hr>");
} 
?>