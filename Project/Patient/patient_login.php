<?php
    session_start();
    if(!empty($_SESSION['email'])){
        
        echo'<script>window.location= "patient_profile.php";</script>';
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
    <link rel="stylesheet" type="text/css" href="../StylesP/patient_login.css">

    <!-- Scripts only -->
    <script src="https://apis.google.com/js/api.js" async defer onload="gLogin();"></script>
    <script src="../AppsP/patient_login.js"></script>

    <title>Patient Login</title>
</head>

<body>

    <?php
        include('pmain_nav.php');
    ?>

    <!--Main Section-->
    
    <div class="main-aregister">
        
        <div class="main-aimage">
            <img src="../images/login/patient_login.jpg" alt="patient login">
        </div>

        <div class="register-form">
        
            <form class="form-aregister" action="../php/patient_logins.php" method="POST">

                <div class="form-group">
                        <h3>Patient Login</h3>
                </div>

                <div class="form-group">
                    <label for="patient_email">Email</label>
                    <input type="email" class="form-control" id="patient_email" placeholder="Email" name="email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>

                <button type="submit" class="btn btn-primary submit-btn" onclick="return validate()">Submit</button>
                
                <!--Login with Google-->
                <div class="row">
                    <div class="col-md-12" style="margin-top: 2%;">
                        <a class="btn btn-lg btn-google btn-block text-uppercase btn-outline" href="../php/patient_login_gauth.php"><img src="https://img.icons8.com/color/16/000000/google-logo.png"> Login With Google</a>
                    </div>
                </div>
            </form>
        </div>
        
    </div>

    <!--Footer Section-->
    <div class="footer bg-dark">
        <p>Copyright 2022 by Cymed. All Rights Reserved.</p>
    </div>
    
</body>

</html>