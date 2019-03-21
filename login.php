<?php

define('USERNAME', 'neilbulloch90');
define ('PASSWORD', '$2y$10$BfGUeNcAP0VU1CnwKfwe3uJ./mWiiuU91J4apbp4b3KKOP/nu17uO');

if (!empty($_POST['username']) && !empty($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    session_start();


    if ($username == USERNAME && password_verify($password, PASSWORD)){
        $_SESSION['logIn'] = true;

        header('Location: account.php');
    } else {
        header('Location: loginPage.php?login=false');
    }
} else {
    echo 'Please enter username and password';
}
