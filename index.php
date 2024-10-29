<?php
require_once 'user.php';

// Initialize variables
$username = "";
$password = "";
$email = "";

// Check for POST parameters
if (isset($_POST['username'])) {
    $username = $_POST['username'];
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
}

// Check for GET parameters
if (isset($_GET['username'])) {
    $username = $_GET['username'];
}

if (isset($_GET['password'])) {
    $password = $_GET['password'];
}

if (isset($_GET['email'])) {
    $email = $_GET['email'];
}

// Create User object
$userObject = new User();

// Registration logic
if (!empty($username) && !empty($password) && !empty($email)) {
    $hashed_password = md5($password);
    $json_registration = $userObject->createNewRegisterUser($username, $hashed_password, $email);
    echo json_encode($json_registration);
    exit; // Stop further execution
}

// Login logic
if (!empty($username) && !empty($password) && empty($email)) {
    $hashed_password = md5($password);
    $json_array = $userObject->loginUsers($username, $hashed_password);
    echo json_encode($json_array);
    exit; // Stop further execution
}

?>
