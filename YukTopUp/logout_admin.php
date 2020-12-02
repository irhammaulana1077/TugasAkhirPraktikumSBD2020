<?php
// Initialize the session
session_start();
    
    unset($_SESSION['loggedinadmin']);
 
    // Redirect to login page
    header("location: login_admin.php");
    exit;
?>