<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Styles/index.css">
    <link rel="stylesheet" type="text/css" href="Styles/login.css">

    <title>Login</title>
</head>

<body>

    <?php
            // Navbar included
            include('navbar.php');
    ?>

    <!--Main Section-->

    <div class="main-heading">
        <h2>Select Your Login Panel</h2>
    </div>
    
    <div class="main-login">

        <div class="login-card">
            <a href="Patient/patient_login.php"><img src="images/login/patient_login.jpg" alt="patient login"></a>
            <h3>Patient Login</h3>
        </div>

        <div class="login-card">
            <a href="Doctor/doctor_login.php"><img src="images/login/doctor_login.jpg" alt="doctor login"></a>
            <h3>Doctor Login</h3>
        </div>
        
        <div class="login-card">
            <a href="Admin/admin_login.php"><img src="images/login/admin_login.png" alt="admin login"></a> 
            <h3>Admin Login</h3>
        </div>

    </div>

    <div class="footer bg-dark">
        <p>Copyright 2022 by Cymed. All Rights Reserved.</p>
    </div>

</body>

</html>