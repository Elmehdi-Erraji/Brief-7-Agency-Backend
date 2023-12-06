<?php

if (isset($_GET['id']) && !empty($_GET['id'])) {
    include '../config/db_con.php';
 
    require_once __DIR__ . '/../modules/users/users.php';

    $userId = $_GET['id'];

    // Call the function to delete the user
    $deleted = deleteUser($conn, $userId);

    if (!$deleted) {
        header("Location: ../view/userList.php");// Redirect on success
        exit();
    } 
} else {
    header("Location: ../view/userList.php"); // Redirect for missing ID
    exit();
}




