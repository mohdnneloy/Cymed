<?php
    session_start();
    if(!empty($_SESSION['aid'])){
        echo'<script>window.location= "admin_profile.php";</script>';
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
    <link rel="stylesheet" type="text/css" href="../StylesA/admin_login.css">

    <!-- Scripts only -->
    <script src="../AppsA/admin_login.js" defer></script>
    
    <title>Admin Login</title>
</head>

<body>

<?php
    // Navbar
    include('amain_nav.php');
?>

    <!--Main Section-->
    
    <div class="main-aregister">
        
        <div class="main-aimage">
            <img src="../images/login/admin_login.png" alt="admin login">
        </div>

        <div class="register-form">
        
            <form class="form-aregister" action="../php/admin_logins.php" method="POST">

                <div class="form-group">
                        <h3>Admin Login</h3>
                </div>

                <div class="form-group">
                    <label for="admin_id">Admin ID</label>
                    <input type="text" class="form-control" id="admin_id" placeholder="Admin ID" name="admin_id">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>

                <button type="submit" class="btn btn-primary submit-btn" onclick="return validate()">Submit</button>
                
            </form>
        </div>
        
    </div>

    <!--Footer Section-->
    <div class="footer bg-dark">
        <p>© Copyright 2022 by Cymed. All Rights Reserved.</p>
    </div>
    
</body>

</html>