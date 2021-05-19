<?php

session_start();

//initializing variables

$username = "";
$email = "";

$errors = array();
//connect to db

$db = mysqli_connect('localhost', 'root', '', 'practise') or die('......');

//Register users

$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);
$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

if (empty($username)) {
    array_push($errors, "Username is required");
} elseif (empty($email)) {
    array_push($errors, "Email is required");
} elseif (empty($password)) {
    array_push($errors, "Password is required");
} elseif (empty($password_2)) {
    array_push($errors, "Repeat password is required");
}elseif ($password != $password_2){
    array_push($errors, "Password must be same as repeated password");
}

$user_check_query = "Select * FROM user WHERE username = '$username' or email = '$email' LIMIT 1";

$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);

if ($user){
    if($user['username'] === $username) {
        array_push($errors, "Username already exists");
    }elseif ($user['email'] === $email){
        array_push($errors, "Email already exists");
    }
}

if(count($errors) == 0){
    $password = md5($password);//this encrypts the password
    $query
}
