<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Styles/index.css">
    <link rel="stylesheet" type="text/css" href="Styles/register.css">

    <title>Register</title>
</head>

<body>

    <?php
        // Navbar included
        include('navbar.php');
    ?>

    <!--Main Section-->

    <div class="main-heading">
        <h2>Select Your Registration Type</h2>
    </div>
    
    <div class="main-register">
        
        <div class="register-card">
            <a href="Patient/patient_registration.php"><img src="images/register/patient_register.webp" alt="patient registration"></a>
            <h3>Patient Registration</h3>
        </div>

        <div class="register-card">
            <a href="Admin/admin_registration.php"><img src="images/register/admin_register.webp" alt="admin registration"></a>
            <h3>Admin Registration</h3>
        </div>
    
    </div>

    <div class="footer bg-dark">
        <p>Copyright 2022 by Cymed. All Rights Reserved.</p>
    </div>
    
</body>

</html>