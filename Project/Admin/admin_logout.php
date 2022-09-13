<?php
    //Destroy Session
    session_start();
    // remove all session variables
    session_unset();
    session_destroy();
    echo'<script>window.location= "admin_login.php";</script>';
?>