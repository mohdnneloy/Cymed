<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../StylesA/admin_registration.css">

    <!-- Script only -->
    <script src="../AppsA/admin_registration.js" defer></script>

    <title>Admin Registration</title>
</head>

<body>

<?php
    //Navbar
    include('amain_nav.php');
?>

    <!--Main Section-->
    
    <div class="main-aregister">
        
        <div class="main-aimage">
            <img src="../images/register/admin_register.webp" alt="admin register">
        </div>

        <div class="register-form">
        
            <form class="form-aregister" action="../php/admin_register.php" method="POST">

                <div class="form-group">
                        <h3>Admin Registration</h3>
                </div>

                <div class="form-group">
                    <label for="last_name">Admin Verification Key</label>
                    <input type="text" class="form-control" id="averification_key" placeholder="Admin Verification Key" name="averification_key">
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
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password">
                </div>

                <button type="submit" class="btn btn-primary submit-btn" onclick="return validate()">Submit</button>
                
            </form>
        </div>
        
    </div>

    <!--Footer Section-->
    <div class="footer bg-dark">
        <p>Copyright 2022 by Cymed. All Rights Reserved.</p>
    </div>
    
</body>

</html>