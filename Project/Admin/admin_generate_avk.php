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
    <link rel="stylesheet" type="text/css" href="../StylesA/admin_generate_avk.css">

    <title>Admin Generate AVK</title>
</head>
<body>

    <?php
        include('apnav.php');
    ?>

    <!--Main Section-->
    <div class="main">
        
        <div class="heading">
            <h3>Generate AVK</h3>
        </div>
        
        <div class="generate-avk">

            <div class="avk-style">
                <a href="../php/admin_generates_avk.php">Generate New AVK</a>
            </div>
            
        </div>
        
    </div>
    
</body>
</html>