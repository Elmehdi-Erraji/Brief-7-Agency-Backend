<?php 

function insertUserQuery() {
    return "INSERT INTO users (firstname, email, password, type) VALUES (?, ?, ?, 3)";
}
function addtUserQuery() {
    return "INSERT INTO users (firstname, email, password, type) VALUES (?, ?, ?, ?)";
}

function loginUserQuery() {
    return "SELECT * FROM users WHERE email = ? LIMIT 1";
}

function isEmailExistsQuery() {
    return "SELECT email FROM users WHERE email = ?";
}

function getUserDetailsQuery() {
    return "SELECT `firstname`, `email`, `password`, `type` FROM `users` WHERE  email = ?";
}

function deleteUser($conn, $userId)
{
    $sql = "DELETE FROM `users` WHERE `id` = ?";

    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $userId);
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $result;
    } else {
        return false;
    }
}

function fetchUsersData($conn) {
    $userData = array(); // Initialize an empty array to store user data

    // Your SQL query to retrieve user data
    $sql = "SELECT `id`,`firstname`, `email`, `type` FROM `users`";

    // Perform the query and fetch data
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Store each row of user data in the array
            $userData[] = $row;
        }
    }

    return $userData; // Return the array containing user data
}