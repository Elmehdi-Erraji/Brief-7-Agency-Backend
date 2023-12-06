<?php
session_start();
include '../config/db_con.php';

$errors = []; // Array to store validation errors

if (isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $user_role = $_POST['user_role']; // Assuming 'user_role' is the name attribute of the select input

    // Validation
    // Add your validation logic here

    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT id FROM users WHERE email = ?";
    $stmt_check = mysqli_prepare($conn, $checkEmailQuery);
    mysqli_stmt_bind_param($stmt_check, "s", $email);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_store_result($stmt_check);

    if (mysqli_stmt_num_rows($stmt_check) > 0) {
        $errors['email'] = "Email already exists. Please choose a different email.";
        $_SESSION['errors'] = $errors;

        // Redirect back to the form with errors
        header("Location: ../view/userUpdate.php?id=$user_id");
        exit();
    }

    // If there are no errors, proceed with the update
    if (empty($errors)) {
        // Update user data in the database using a separate function for the SQL query
        updateUser($conn, $user_id, $name, $email, $user_role);

        // Redirect to a success page or perform other actions upon successful update
        header("Location: ../view/userUpdate.php?id=$user_id&success=1");
        exit();
    } else {
        $_SESSION['errors'] = $errors;
        // Redirect back to the form with errors
        header("Location: ../view/userUpdate.php?id=$user_id");
        exit();
    }
}

// Function to update user information in the database using prepared statements
function updateUser($conn, $user_id, $name, $email, $user_role)
{
    $updateUserQuery = "UPDATE users SET firstname = ?, email = ?, type = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $updateUserQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssii", $name, $email, $user_role, $user_id);

        if (mysqli_stmt_execute($stmt)) {
            // Successful update
        } else {
            $errors['db_error'] = "Error: " . mysqli_error($conn);
            $_SESSION['errors'] = $errors;
        }

        mysqli_stmt_close($stmt);
    } else {
        $errors['db_error'] = "Error: " . mysqli_error($conn);
        $_SESSION['errors'] = $errors;
    }
}

// Close the database connection
mysqli_close($conn);
?>
