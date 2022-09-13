<?php
session_start();

    // If logged out and session variables are empty then return to login page
    if(empty($_SESSION['email'])){
        
        echo '<script>window.location= "patient_login.php";</script>';
        exit();
    }

    // Specialist Selection for appointment

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../StylesP/patient_make_appointment.css">

    <!-- Scripts only -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
    <script src="../AppsP/patient_make_appointment_ajax.js" async></script>
    

    <title>Patient Profile</title>

    
</head>
<body>

    <?php
        include('ppnav.php');
    ?>

    <!--Main Section-->

    <div class="main">
        
        <div class="heading">
            <h3>Make Appointment</h3>
        </div>
        
        <div class="appointment">

            <div class="register-form">
            
            <form class="form-aregister" action="patient_make_appointment_fetch.php" method="POST">

                <div class="form-group">
                        <h3>Make Appointment</h3>
                </div>

                <div class="specialist" id="specialist"></div>
                <div class="dname" id="dname"></div>
                <div class="day" id="day"></div>
                <div class="date" id="date"></div>
                <div class="time" id="time"></div>
            </form>
        </div>
    </div>
    
</body>
</html>
