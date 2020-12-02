<?php
// Initialize the session
session_start();
    
    // Destroy the session.
    unset($_SESSION['loggedin']);
 
    // Redirect to login page
    header("location: login.php");
    exit;

?>