<?php 
include '../config/db_con.php';



// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set parameters for the user registration
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password for security
    $role_id = 3; // Fixed role_id value for users

    // SQL query to insert user data using the existing connection
    $sql = "INSERT INTO usere (username, email, PASSWORD, role_id) VALUES (?, ?, ?, ?)";
    
    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "sssi", $username, $email, $hashed_password, $role_id);

        // Attempt to execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Registration successful
            echo "User registered successfully!";
        } else {
            // Registration failed
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        // Statement preparation failed
        echo "Error: " . mysqli_error($conn);
    }
}
