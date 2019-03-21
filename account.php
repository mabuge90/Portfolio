<?php
session_start();

if (empty($_SESSION['logIn']) || $_SESSION['logIn'] != true) {
    header('Location: loginPage.php');
} else {
    header('Location: admin.php');
}