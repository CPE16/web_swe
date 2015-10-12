<?php 

    // First we execute our common code to connection to the database and start the session 
    require "config.php";
     session_start();
    // We remove the user's data from the session 
    unset($_SESSION['login_user']); 
    header("Location: login.php"); 
    die("Redirecting to: login.php");
?>