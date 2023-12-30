<?php
// Start the session
session_start();

// Destroy all session data
session_destroy();


header("Location: login/login.php");
exit();