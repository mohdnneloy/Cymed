<?php
    //Destroy Session
    session_start();
    // remove all session variables
    session_unset();
    session_destroy();
    echo'<script>window.location= "patient_login.php";</script>';
?>