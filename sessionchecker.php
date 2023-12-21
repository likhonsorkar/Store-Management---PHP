<?php
    if (session_status() == PHP_SESSION_NONE) {
        // Start the session only if it's not already started
        session_start();
    }

    if(isset($_SESSION['fname']) && isset($_SESSION['lname']) && isset($_SESSION['email'])){
        // User is logged in, continue with your logic
    } else {
        header('Location:/stms/login.php?geust');
        exit();
    }
?>
