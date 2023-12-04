<?php
require_once __DIR__ . '/../vendor/autoload.php';
// Replace 'path_to_vendor' with the actual path from the config file to the vendor directory



// Load environment variables from the .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();


// Access the environment variables
$dbHost = $_ENV['DB_HOST'];
$dbName = $_ENV['DB_NAME'];
$dbUser = $_ENV['DB_USER'];
$dbPassword = $_ENV['DB_PASSWORD'];

// Create connection using mysqli
$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

