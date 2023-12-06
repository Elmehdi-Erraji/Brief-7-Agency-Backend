<?php
// Include necessary files and database connection
include '../config/db_con.php';
require_once __DIR__ . '/../modules/users/users.php';

// Fetch user data from the database
$usersData = fetchUsersData($conn);

// Close the database connection
mysqli_close($conn);

// Send the fetched data as a JSON response
header('Content-Type: application/json');
echo json_encode($usersData);
exit(); // Stop further execution

