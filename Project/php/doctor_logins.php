<?php
    require('../php/doctor_functions.php');
    $login_success = doctorLogin();
    
    if($login_success == true){
        echo '<script>window.location= "../Doctor/doctor_profile.php";</script>';
    }
    
    else{
        echo '<script>window.location= "../Doctor/doctor_login.php";</script>'; // Return to login page
    }
?>