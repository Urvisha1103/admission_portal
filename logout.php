<?php
// logout.php

session_start(); // Start the session

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the home page or login page
header("Location: index.php"); // Or header("Location: login.php");
exit;
?>