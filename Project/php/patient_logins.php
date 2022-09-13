<?php
    require('../php/patient_functions.php');
    $login_success = patientLogin();
    
    if($login_success == true){
        echo '<script>window.location= "../Patient/patient_profile.php";</script>';
    }
    
    else{
        echo '<script>window.location= "../Patient/patient_login.php";</script>'; // Return to login page
    }
?>