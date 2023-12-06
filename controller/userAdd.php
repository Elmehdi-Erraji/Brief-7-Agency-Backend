<?php 
session_start();
include '../config/db_con.php';

require_once __DIR__ . '/../modules/users/users.php';



$errors = []; // Array to store validation errors



// if (isset($_POST['submit'])) {
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $password_confirm = $_POST['confirmPassword'];
//     $user_role = $_POST['user_role']; // Assuming 'user_role' is the name attribute of the select input

//     // Validation
//     if ($password !== $password_confirm) {
//         $errors['password'] = "Passwords do not match.";
//     }

//     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         $errors['email'] = "Invalid email format";
//     }

//     // Further checks and database interactions

//     if (empty($errors)) {
//         // Insert user data into the database
//         $insertUserQuery = "INSERT INTO users (firstname, email, password, type) VALUES ('$name', '$email', '$password', $user_role)";

//         if (mysqli_query($conn, $insertUserQuery)) {
//             $_SESSION['user_added'] = true;
//             // Redirect to a success page or perform other actions upon successful registration
//             header("Location: ../view/userAdd.php");
//             exit();
//         } else {
//             $errors['db_error'] = "Error: " . mysqli_error($conn);
//         }
//     }

//     // Store errors in session
//     $_SESSION['errors'] = $errors;
//     $_SESSION['old_input'] = $_POST; // Store old form input to repopulate fields if needed

//     // Redirect back to the form with errors
//     header("Location: ../view/userAdd.php");
//     exit();
// }


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['confirmPassword'];
    $user_role = $_POST['user_role']; // Assuming 'user_role' is the name attribute of the select input

    // Validation
    if ($password !== $password_confirm) {
        $errors['password'] = "Passwords do not match.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    }

    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT * FROM users WHERE email = ?";
    $stmt_check = mysqli_prepare($conn, $checkEmailQuery);
    mysqli_stmt_bind_param($stmt_check, "s", $email);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_store_result($stmt_check);

    if (mysqli_stmt_num_rows($stmt_check) > 0) {
        $errors['email'] = "Email already exists. Please choose a different email.";
    }

    // Further checks and database interactions
    if (empty($errors)) {
    
        // Hash the password securely
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the database
        $insertUserQuery = "INSERT INTO users (firstname, email, password, type) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insertUserQuery);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $hashed_password, $user_role);

            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['user_added'] = true;
                // Redirect to a success page or perform other actions upon successful registration
                header("Location: ../view/userAdd.php");
                exit();
            } else {
                $errors['db_error'] = "Error: " . mysqli_error($conn);
            }
        } else {
            $errors['db_error'] = "Error: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    }
    
    // Store errors in session
    $_SESSION['errors'] = $errors;
    $_SESSION['old_input'] = $_POST; // Store old form input to repopulate fields if needed

    // Redirect back to the form with errors
    header("Location: ../view/userAdd.php");
    exit();
}



// if (isset($_POST['submit'])) {
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $password_confirm = $_POST['confirmPassword'];
//     $user_role = $_POST['user_role']; // Assuming 'user_role' is the name attribute of the select input

//     // Validation
//     if ($password !== $password_confirm) {
//         $errors['password'] = "Passwords do not match.";
//     }

//     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         $errors['email'] = "Invalid email format";
//     }

  
//    // Check if the email already exists in the database
//    $checkEmailQuery = isEmailExistsQuery(); 
//    $stmt_check = mysqli_prepare($conn, $checkEmailQuery);
//    mysqli_stmt_bind_param($stmt_check, "s", $email);
//    mysqli_stmt_execute($stmt_check);
//    mysqli_stmt_store_result($stmt_check);

//    if (mysqli_stmt_num_rows($stmt_check) > 0) {
//        $errors['email'] = "Email already exists. Please choose a different email.";
//    }

//     // Further checks and database interactions

//     if (empty($errors)) {
//         switch ($user_role) {
//             case "Admin":
//                 $roleValue = 1;
//                 break;
//             case "Manager":
//                 $roleValue = 2;
//                 break;
//             case "Client":
//                 $roleValue = 3;
//                 break;
//             default:
//                 $roleValue = 0; // Default value or handle unrecognized roles
//                 break;
//         }
//         // Hash the password securely
//         $hashed_password = password_hash($password, PASSWORD_DEFAULT);

//         // Insert user data into the database using the function from user_functions.php
//         $insertUserQuery = addtUserQuery(); // Replace with your insert query

//         $stmt = mysqli_prepare($conn, $insertUserQuery);
//         if ($stmt) {
//             mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $hashed_password,$roleValue);

//             if (mysqli_stmt_execute($stmt)) {
//                 $_SESSION['user_added'] = true;
//                 // Redirect to a success page or perform other actions upon successful registration
//                 header("Location: ../view/userAdd.php");
//                 exit();
//             } else {
//                 $errors['db_error'] = "Error: " . mysqli_error($conn);
//             }
//         } else {
//             $errors['db_error'] = "Error: " . mysqli_error($conn);
//         }

//         mysqli_stmt_close($stmt);
//     }
    
//     // Store errors in session
//     $_SESSION['errors'] = $errors;
//     $_SESSION['old_input'] = $_POST; // Store old form input to repopulate fields if needed

//     // Redirect back to the form with errors
//     header("Location: ../view/userAdd.php");
//     exit();
// }

