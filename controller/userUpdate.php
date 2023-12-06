<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../view/LogIn.php");
    exit();
}

include '../config/db_con.php';
require_once __DIR__ . '/../modules/users/users.php';

$errors = []; // Array to store validation errors

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $user_id = $_POST['user_id']; // Assuming the user ID is submitted through a hidden field in the form
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

    // Check if the email already exists in the database for another user
    $checkEmailQuery = "SELECT `id` FROM `users` WHERE `email` = ? AND `id` != ?";
    $stmt_check = mysqli_prepare($conn, $checkEmailQuery);
    mysqli_stmt_bind_param($stmt_check, "si", $email, $user_id);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_store_result($stmt_check);

    if (mysqli_stmt_num_rows($stmt_check) > 0) {
        $errors['email'] = "Email already exists for another user. Please choose a different email.";
    }

    // Further checks and database interactions based on your requirements

    if (empty($errors)) {
        // Perform the update query
        // Example: $updateUserQuery = "UPDATE `users` SET `firstname`=?, `email`=?, ... WHERE `id`=?";
        // Prepare and execute the update statement with placeholders
        // ...

        // Redirect or perform other actions upon successful update
        // header("Location: success.php");
        // exit();
    } else {
        // Store errors in session and redirect back to the form
        $_SESSION['errors'] = $errors;
        $_SESSION['old_input'] = $_POST; // Store old form input to repopulate fields if needed
        header("Location: ../view/userUpdate.php?id=" . $user_id);
        exit();
    }
} else {
    // Redirect or handle cases when form is not submitted properly
    header("Location: ../error-page.php");
    exit();
}
?>
