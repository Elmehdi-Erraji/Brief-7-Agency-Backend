<?php
include '../config/db_con.php';
require_once __DIR__ . '/../modules/users/users.php';


session_start(); // Start session

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch login query from user_functions.php
    $loginUserQuery = loginUserQuery();

    $stmt = mysqli_prepare($conn, $loginUserQuery);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        
        $result = mysqli_stmt_get_result($stmt);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row['password'];
            $user_type = $row['type']; // Assuming 'type' column holds user roles
            
            // Verify the password
            if (password_verify($password, $hashed_password)) {
                // Password is correct, login successful
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['user_type'] = $user_type; // Set user type in session
                

                 // Redirect all users to a single dashboard
                 header("Location: dashboard.php");
                 exit();
             
            } else {
                // Password is incorrect
                echo "Invalid password";
            }
        } else {
            // User not found
            echo "User not found";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
} else {
    // Redirect to login page if accessed without form submission
    header("Location: ../view/LogIn.php");
    exit();
}