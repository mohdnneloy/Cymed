<?php
    
    require('../connect.php'); // Adding connect file for database connection
    session_start();

    // If logged out and session variables are empty then return to login page
    if(empty($_SESSION['aid'])){
        
        echo '<script>window.location= "admin_login.php";</script>';
        exit();
    }

    $aid = $_SESSION['aid']; 

    // Fetching Data from database
    $sql0 = "Select * From admin Where aid = '$aid'";
    $result0 = mysqli_query($conn, $sql0);

    while($row = mysqli_fetch_array($result0)){ 
        $first_name = $row["first_name"];
        $last_name = $row["last_name"];
        $date_of_birth = $row["date_of_birth"];
        $gender = $row["gender"];
        $contact_no = $row["contact_no"];
        $join_date = $row["join_date"];
        $email = $row['email'];
    }  

    // Calculating age
    $today = date("Y-m-d");
    $age = date_diff(date_create($date_of_birth), date_create($today));

    // Closing Connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../StylesA/admin_profile.css">

    <title>Admin Profile</title>
</head>

<body>

    <?php
        include('apnav.php');
    ?>

    <!--Main Section-->
    <div class="main">
        
        <div class="heading">
            <h3>Profile</h3>
        </div>
        
        <div class="profile-data">
            <p>Admin ID: <span><?php echo $aid?></span> </p>
            <p>Joined Date: <span><?php echo $join_date?></span> </p>
            <p>Name: <span><?php echo $first_name . " " . $last_name?></span> </p>
            <p>Date of Birth: <span><?php echo $date_of_birth?></span> </p>
            <p>Age: <span><?php echo $age->format('%y')?></span> </p>
            <p>Email: <span><?php echo $email?></span> </p>
            <p>Gender: <span><?php echo $gender?></span> </p>
            <p>Contact Number: <span><?php echo $contact_no?></span> </p>
        </div>
        
    </div>
    
</body>
</html>