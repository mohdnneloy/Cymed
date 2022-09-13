<?php

    // Function to generate ID for a newly registered patient
    function generatePatientID(){

        require('../connect.php'); // Adding connect file for database connection

        // Fetching Data from database
        $sql0 = "Select count(*) as Count From patient;";
        $result0 = mysqli_query($conn, $sql0);
        $sqle = "Select pid from patient ORDER BY pid DESC LIMIT 1;";
        $resulte = mysqli_query($conn, $sqle);

        while($row = mysqli_fetch_array($result0)) {
            $check = $row['Count'];
          }

        while($row = mysqli_fetch_array($resulte)) {
            $patient_idr = $row['pid'];
        }

        //Checking if the database is empty or not
        if($check == 0){
            $patient_id = '300000000000';
        }
        else{
            $patient_id = $patient_idr + 1; //Incrementing ID for new patient
        }

        // Close Connection
        mysqli_close($conn);

        return $patient_id;
    }

    // Function to register a new patient
    function patientRegister(){

        require('../connect.php'); // Adding connect file for database connection
       
        // Form data stored into variables

        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $date_of_birth = $_POST["date_of_birth"];
        $gender = $_POST["gender"];
        $contact_no = $_POST["contact"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $join_date = date("Y-m-d");

        // Checking if email already exists or not
        $sql = "Select email From patient Where email = '$email';";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result)) {
            $emailcheck = $row['email'];
        }

        if (!empty($emailcheck)){

            // Close Connection
            mysqli_close($conn);

            echo '<script>alert("An account with the same email already exists!")</script>';
            echo '<script>window.location= "../Patient/patient_registration.php";</script>';
            exit();
        }

        else{

            $patient_id = generatePatientID();
            $sql1 = "Insert Into patient (pid, first_name, last_name, date_of_birth, gender, contact_no, email, password, join_date)
                  Value ('$patient_id', '$first_name', '$last_name', '$date_of_birth', '$gender', '$contact_no', '$email', md5('$password'), '$join_date');";
            mysqli_query($conn, $sql1);

            // Close Connection
            mysqli_close($conn);

            echo '<script>alert("You have been Registered!")</script>';
            echo'<script>window.location= "../index.php";</script>';
            exit();

        }
        
    }

    // Patient Login: Returns true if Login is Successfull
    function patientLogin(){

        require('../connect.php'); // Adding connect file for database connection

        // Form data stored into variables

            $email = $_POST["email"];
            $password = $_POST["password"];

        // Fetching Data from database
        $sql0 = "Select email, password From patient Where email = '$email' AND password = md5('$password');";
        $result0 = mysqli_query($conn, $sql0);

        while($row = mysqli_fetch_array($result0)) {
            $emailcheck = $row['email'];
            $passwordcheck = $row['password'];
        }

        if(!empty($emailcheck) && !empty($passwordcheck)){
            
            session_start(); // Session Created
            session_unset(); // remove all session variables

            $_SESSION['email'] = $email; // Session variable created for further use
            $_SESSION['password'] = $password; // Session variable created for further use

            // Close Connection
            mysqli_close($conn);

            echo '<script>window.location= "../Patient/patient_profile.php";</script>'; // Redirect to the specified path
            return true; // Login Successfull
            exit();
        }

        else if (empty($emailcheck)){
            
            // Close Connection
            mysqli_close($conn);

            echo '<script>alert("Email is not registered or password did not!");</script>';
            echo '<script>window.location= "../Patient/patient_login.php";</script>';
            return false; // Login Unsuccessfull
            exit();
        }

        else if (empty($passwordcheck)){

            // Close Connection
            mysqli_close($conn);

            echo '<script>alert("Password did not match!");</script>';
            echo '<script>window.location= "../Patient/patient_login.php";</script>';
            return false; // Login Unsuccessfull
            exit();
        }
        
    }

?>