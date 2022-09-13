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
    <link rel="stylesheet" type="text/css" href="../StylesA/admin_remove_doctor.css">

    <!--Scripts only-->
    <script src="../AppsA/admin_remove_doctor.js" defer></script>

    <title>Remove Doctor</title>

</head>
<body>

    <?php
        include('apnav.php');
    ?>

    <!--Main Section-->
    <div class="main">
        
        <div class="heading">
            <h3>Remove Doctor</h3>
        </div>
        
        <div class="register-form">
        
            <form class="form-aregister" action="../php/admin_remove_doctors.php" method="POST">

                <div class="form-group">
                        <h3>Remove Doctor</h3>
                </div>

                <div class="form-group">
                    <label for="did">Doctor ID</label>
                    <input type="text" class="form-control" id="did" placeholder="Doctor ID" name="did">
                </div>

                <button type="submit" class="btn btn-primary submit-btn btn-danger" onclick="return validate()">Delete</button>
                
            </form>

        </div>
        
    </div>
    
</body>
</html>
