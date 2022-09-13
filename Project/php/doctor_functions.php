<?php

    function doctorLogin(){
        require('../connect.php'); // Adding connect file for database connection

        // Form data stored into variables

            $doctor_initial = $_POST["doctor_initial"];
            $password = $_POST["password"];

        // Fetching Data from database
        $sql0 = "Select did, doctor_initial, password From doctor Where doctor_initial = '$doctor_initial ' AND password = md5('$password');";
        $result0 = mysqli_query($conn, $sql0);

        while($row = mysqli_fetch_array($result0)) {
            $did = $row['did'];
            $passwordcheck = $row['password'];
            $doctor_initialcheck = $row['doctor_initial'];
        }

        if(!empty($doctor_initialcheck) && !empty($passwordcheck)){
            
            session_start(); // Session Started
            session_unset(); // Remove all session variables

            $_SESSION['did'] = $did; // Session variable created for further use
            $_SESSION['password'] = $password; // Session variable created for further use

            // Close Connection
            mysqli_close($conn);

            echo '<script>window.location= "../Doctor/doctor_profile.php";</script>'; // Redirect to the specified path
            return true; // Login Successfull
            exit();
        }

        else if (empty($doctor_initialcheck)){

            // Close Connection
            mysqli_close($conn);

            echo '<script>alert("Doctor not registered or password did not match!");</script>';
            echo '<script>window.location= "../Doctor/doctor_login.php";</script>';
            return false; // Login Unsuccessfull
            exit();
        }

        else if (empty($passwordcheck)){

            // Close Connection
            mysqli_close($conn);
            
            echo '<script>alert("Password did not match!");</script>';
            echo '<script>window.location= "../Doctor/doctor_login.php";</script>';
            return false; // Login Unsuccessfull
            exit();
        }
    }

?>