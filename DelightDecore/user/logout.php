<?php
session_start();

// Destroy the session to log the user out
session_destroy();

// Redirect the user to the home page or any other page
header("Location: form/userlogin.php");
exit;
?>