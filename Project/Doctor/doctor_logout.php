<?php
    // Start the Session
    session_start();

    // Unset all the session variables
    session_unset();

    // Destroy Session
    session_destroy();
    echo'<script>window.location= "doctor_login.php";</script>';
?>