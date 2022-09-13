<?php
    
    require('../connect.php'); // Adding connect file for database connection
    session_start();

    // If logged out and session variable are empty then return to login page
    if(empty($_SESSION['did'])){
        
        echo '<script>window.location= "doctor_login.php";</script>';
        exit();
    }

    $did = $_SESSION['did']; 

    // Retrieving details for the Doctor ID from the database
    $sql0 = "Select * From doctor Where did = '$did'";
    $result0 = mysqli_query($conn, $sql0);

    while($row = mysqli_fetch_array($result0)){ 
        $did = $row["did"];
        $first_name = $row["first_name"];
        $last_name = $row["last_name"];
        $date_of_birth = $row["date_of_birth"];
        $gender = $row["gender"];
        $contact_no = $row["contact_no"];
        $join_date = $row["join_date"];
        $email = $row['email'];
        $designation = $row["designation"];
        $university = $row["university"];
        $qualification = $row["qualification"];
        $start_time = $row["start_time"];
        $finish_time = $row["finish_time"];
        $doctor_initial = $row["doctor_initial"];
        $sunday = $row["sunday"];
        $monday = $row["monday"];
        $tuesday = $row["tuesday"];
        $wednesday = $row["wednesday"];
        $thursday= $row["thursday"];
        $friday= $row["friday"];
        $saturday = $row["saturday"];
        
    }  

    // Days String based on boolean value from the database
    $days = '';

    if($sunday == 1){
        $days .= 'Sunday, ';
    }

    if($monday == 1){
        $days .= 'Monday, ';
    }

    if($tuesday == 1){
        $days .= 'Tuesday, ';
    }

    if($wednesday == 1){
        $days .= 'Wednesday, ';
    }

    if($thursday == 1){
        $days .= 'Thurday, ';
    }

    if($friday == 1){
        $days .= 'Friday, ';
    }

    if($saturday == 1){
        $days .= 'Saturday, ';
    }

    $days[strlen($days)-2] = ' '; // Changing the last comma to an empty space

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
    <link rel="stylesheet" type="text/css" href="../StylesD/doctor_profile.css">
    
    <title>Doctor Profile</title>
</head>
<body>

    <?php
        // Including doctor panel navbar
        include('dpnav.php');
    ?>

    <!--Main Section-->
    <div class="main">
        
        <div class="heading">
            <h3>Profile</h3>
        </div>
        
        <div class="profile-data">
            <p>Doctor ID: <span><?php echo $did?></span> </p>
            <p>Doctor Initial: <span><?php echo $doctor_initial?></span> </p>
            <p>Joined Date: <span><?php echo $join_date?></span> </p>
            <p>Name: <span><?php echo $first_name . " " . $last_name?></span> </p>
            <p>Date of Birth: <span><?php echo $date_of_birth?></span> </p>
            <p>Email: <span><?php echo $email?></span> </p>
            <p>Gender: <span><?php echo $gender?></span> </p>
            <p>Contact Number: <span><?php echo $contact_no?></span> </p>
            <p>Designation: <span><?php echo $designation?></span> </p>
            <p>Qualification: <span><?php echo $qualification?></span> </p>
            <p>University: <span><?php echo $university?></span> </p>
            <p>Work Days: <span><?php echo $days?></span> </p>
            <p>Time: <span><?php echo date("h:ia", strtotime($start_time)). " to ". date("h:ia", strtotime($finish_time))?></span> </p>
        </div>
    </div>
    
</body>
</html>