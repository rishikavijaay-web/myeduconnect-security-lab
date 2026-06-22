<?php
session_start();

/* Clear all session variables */
$_SESSION = [];

/* Delete the session cookie */
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

/* Destroy session */
session_destroy();

/* Prevent browser cache from keeping old logged-in pages */
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

/* Redirect to login */
header("Location: login.php?loggedout=1");
exit();
?>
