<?php

include("../db.php");
include("middleware.php");


$table = 'users';

$admin_users = selectAll($table);

$errors = array();
$id = '';
$name = '';
$admin = '';
$email = '';
$password = '';
$passwordConf = '';

if (isset($_GET['delete_id'])) {
    adminOnly();
    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = 'Admin user deleted';
    $_SESSION['type'] = 'success';
    header('location: users-index.php');
    exit();
}
