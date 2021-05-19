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
} elseif ($password != $password_2) {
    array_push($errors, "Password must be same as repeated password");
}

$user_check_query = "Select * FROM user WHERE username = '$username' or email = '$email' LIMIT 1";

$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);

if ($user) {
    if ($user['username'] === $username) {
        array_push($errors, "Username already exists");
    } elseif ($user['email'] === $email) {
        array_push($errors, "Email already exists");
    }
}

if (count($errors) == 0) {
    $password = md5($password);//this encrypts the password
    $query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";

    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";

    header('location: index1.php');

}

//login user
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, 'empty');
    } elseif (empty($password)) {
        array_push($errors, 'empty');
    }
    if (count($errors) == 0) {
        $password = md5($password);

        $query = "SELECT * FROM user WHERE username='$username' and password = '$password'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results)) {
            $_SESSION['username'] == $username;
            $_SESSION['success'] == "Logged succesfully";
            header('location: index1.php');
        } else {
            array_push($errors, "Wrong whatever");
        }
    }
}
