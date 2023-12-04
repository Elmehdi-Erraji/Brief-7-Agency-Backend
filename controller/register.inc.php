<?php 
include '../config/db_con.php';

require_once __DIR__ . '/../modules/users/users.php';

// Check if the form is submitted
// if (isset($_POST['submit'])) {
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $password_confirm = $_POST['password_confirm'];

//     // Validation (You should perform more thorough validation as needed)

//     if ($password !== $password_confirm) {
//         echo "Passwords do not match.";
//         exit();
//     }

//     // Hash the password securely
//     $hashed_password = password_hash($password, PASSWORD_DEFAULT);

//     // Insert user data into the database using prepared statements
//     $sql = "INSERT INTO users (firstname, email, password, type) VALUES (?, ?, ?, ?)";
//     $type = 3; // Default value for type
//     // Prepare the statement
//     $stmt = mysqli_prepare($conn, $sql);
//     if ($stmt) {
//         // Bind parameters
//         mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $hashed_password, $type);

//         // Execute the statement
//         if (mysqli_stmt_execute($stmt)) {
//             echo "New record created successfully";
//             // Redirect to a success page or perform other actions upon successful registration
//             header("Location: registration_success.php");
//             exit();
//         } else {
//             echo "Error: " . mysqli_error($conn);
//         }
//     } else {
//         echo "Error: " . mysqli_error($conn);
//     }

//     mysqli_stmt_close($stmt);
// }

// mysqli_close($conn);


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    // Validation (You should perform more thorough validation as needed)

    if ($password !== $password_confirm) {
        echo "Passwords do not match.";
        exit();
    }

    // Hash the password securely
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database using the function from user_functions.php
    $insertUserQuery = insertUserQuery();

    $stmt = mysqli_prepare($conn, $insertUserQuery);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashed_password);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "New record created successfully";
            // Redirect to a success page or perform other actions upon successful registration
            header("Location: ../view/LogIn.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}