<?php

define('USERNAME', 'neilbulloch90');
define ('PASSWORD', 'password1234');

if (!empty($_POST['USERNAME']) && !empty($_POST['PASSWORD'])) {

    $username = $_POST['USERNAME'];
    $password = $_POST['PASSWORD'];
    session_start();


    if ($username == USERNAME && password_verify($password, PASSWORD)){
        $_SESSION['logIn'] = true;

        header('Location: account.php');
    } else {
        echo 'Login failed';
        header('Location: loginPage.php?login=false');
    }
} else {
    echo 'Please enter username and password';
}
