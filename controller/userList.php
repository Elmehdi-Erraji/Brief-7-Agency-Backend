<?php
include '../config/db_con.php';
 
require_once __DIR__ . '/../modules/users/users.php';
function getUsersData($conn)
{
    $type = array('', "Admin", "Project Manager", "Employee");
    $qry = mysqli_query($conn, "SELECT `id`, `firstname`, `email`, `type` FROM `users`");
    $usersData = array();

    while ($row = mysqli_fetch_assoc($qry)) {
        $row['role'] = $type[$row['type']];
        $usersData[] = $row;
    }

    return $usersData;
}
$usersData = getUsersData($conn);

?>