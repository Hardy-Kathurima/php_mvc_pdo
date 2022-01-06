<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "pdo_mvc";

try {
    $db = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    echo $error->getMessage();
}
