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
