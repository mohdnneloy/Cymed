<?php

    session_start();

    // If logged out and session variables are empty then return to login page
    if(empty($_SESSION['aid'])){
        
        echo '<script>window.location= "admin_login.php";</script>';
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../StylesA/admin_add_doctor.css">

    <!-- Scripts only -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="../AppsA/add_doctor_ajax.js" defer></script>
    
    <title>Add Doctor</title>
</head>

<body>

    <?php
        include('apnav.php');
    ?>

    <!--Main Section-->
    <div class="main">
        
        <div class="heading">
            <h3>Add Doctor</h3>
        </div>
        
        <div class="register-form">
        
            <form class="form-aregister" action="../php/admin_add_doctors.php" method="POST">

                <div class="form-group">
                        <h3>Add Doctor</h3>
                </div>

                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name">
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name">
                </div>

                <div class="form-group">
                    <label for="date_of_birth">Date Of Birth</label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
                </div>

                <div class="form-group gender">

                    <label for="gender">Gender:</label>
                
                    <div class="form-check form-check-inline male">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male" checked="checked">
                        <label class="form-check-label" for="Male">Male</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                        <label class="form-check-label" for="Female">Female</label>
                    </div>
                
                </div>

                <div class="form-group">
                    <label for="contact">Contact Number</label>
                    <input type="number" class="form-control" id="contact" placeholder="Contact No." name="contact">
                </div>

                <div class="form-group">
                    <label for="designation">Designation</label>
                    <input type="text" class="form-control" id="designation" placeholder="Designation" name="designation" required>
                </div>

                <div class="form-group">
                    <label for="qualification">Qualification</label>
                    <input type="text" class="form-control" id="qualification" placeholder="Qualification" name="qualification" required>
                </div>

                <div class="form-group">
                    <label for="university">University</label>
                    <input type="text" class="form-control" id="university" placeholder="University" name="university" required>
                </div>

                <div class="form-group">
                    <label for="experience_years">Experience in years</label>
                    <input type="number" min="0" class="form-control" id="experience_years" placeholder="Experience in years" name="experience_years" required>
                </div>

                <div class="form-group wdays">

                    <label for="wdays">Select Work Days:</label><br>
                
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Sunday" name="sunday" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Sunday</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Monday" name="monday" value="0">
                        <label class="form-check-label" for="inlineCheckbox1">Monday</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Tuesday" name="tuesday" value="0">
                        <label class="form-check-label" for="inlineCheckbox1">Tuesday</label>
                    </div><br>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Wednesday" name="wednesday" value="0">
                        <label class="form-check-label" for="inlineCheckbox1">Wednesday</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Thursday" name="thursday" value="0">
                        <label class="form-check-label" for="inlineCheckbox1">Thursday</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Friday" name="friday" value="0">
                        <label class="form-check-label" for="inlineCheckbox1">Friday</label>
                    </div><br>

                    <div class="form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Saturday" name="saturday" value="0">
                        <label class="form-check-label" for="inlineCheckbox1">Saturday</label>
                    </div> 
                
                </div>

                <div class="form-group">
                    <label for="start_time">Start Time</label>
                    <input type="time" class="form-control" id="start_time" name="start_time" required>
                </div>

                <div class="form-group">
                    <label for="finish_time">Finish Time</label>
                    <input type="time" class="form-control" id="finish_time" name="finish_time" required>
                </div>

                <div class="form-group">
                    <label for="doctor_initial">Doctor Initial</label>
                    <input type="text" class="form-control" id="doctor_initial" placeholder="Doctor Initial" name="doctor_initial"  maxlength="4" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password" required>
                </div>

                <button type="submit" class="btn btn-primary submit-btn" onclick="return validate()">Submit</button>
                
            </form>

        </div>
        
    </div>
    
</body>
</html>

