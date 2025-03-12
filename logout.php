<?php
session_start();
    $_SESSION['full_name'] = "";
    $_SESSION['email'] = "";
    $_SESSION['type'] = "";
    $_SESSION['username'] = "";
    $_SESSION['contact'] = "";
    $_SESSION['login'] = false;
    $_SESSION['id'] = "";

    unset($_SESSION['full_name']);
    unset($_SESSION['email']);
    unset($_SESSION['type']);
    unset($_SESSION['username']);
    unset($_SESSION['contact']);
    unset($_SESSION['login']);
    unset($_SESSION['id']);

    header("Location: login.php");

?>