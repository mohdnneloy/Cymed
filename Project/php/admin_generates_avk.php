<?php
    require('../connect.php'); // Adding connect file for database connection
    require('admin_functions.php'); // Random String Generator Required

    session_start(); // Starting Session

    $aid = $_SESSION['aid']; 
    $admin_verification_key = generateRandomString(7);
    $key_generated_date = date("Y-m-d");

    
    // Fetching Data from database
    $sql0 = "Select count(*) as Count From adminvkeys;";
    $result0 = mysqli_query($conn, $sql0);
    $sqle = "Select kid from adminvkeys ORDER BY kid DESC LIMIT 1;";
    $resulte = mysqli_query($conn, $sqle);

    while($row = mysqli_fetch_array($result0)) {
        $check = $row['Count'];
      }

    // Checking if the database is empty or not
    if($check == 0){
        $kid = '0';
    }

    else{
        while($row = mysqli_fetch_array($resulte)) {
            $kid = $row['kid'];
        }
        $kid = $kid + 1; //Incrementing ID for new avk
    }

    // Inserting new avk into the database
    $sql1 = "Insert Into adminvkeys (kid, admin_verification_key, key_generated_date, generated_by_admin_aid)
                  Value ('$kid', '$admin_verification_key', '$key_generated_date', '$aid');";
            mysqli_query($conn, $sql1);

            echo '<script>alert("New AVK has been Generated: '.$admin_verification_key.'")</script>';
            echo'<script>window.location= "../Admin/admin_profile.php";</script>';
?>