<?php
    require('../php/admin_functions.php');
    $login_success = adminLogin();
    
    if($login_success == true){
        echo '<script>window.location= "../Admin/admin_profile.php";</script>';
    }
    
    else{
        echo '<script>window.location= "../Admin/admin_login.php";</script>'; // Return to login page
    }
?>