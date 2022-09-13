<?php

    // Function to generate a random string of a given length
    function generateRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    // Function to generate ID for new admin
    function generateAdminID(){

        require('../connect.php'); // Adding connect file for database connection

        // Fetching Data from database
        $sql0 = "Select count(*) as Count From admin;";
        $result0 = mysqli_query($conn, $sql0);
        $sqle = "Select aid from admin ORDER BY aid DESC LIMIT 1;";
        $resulte = mysqli_query($conn, $sqle);

        while($row = mysqli_fetch_array($result0)) {
            $check = $row['Count'];
          }

        while($row = mysqli_fetch_array($resulte)) {
            $admin_idr = $row['aid'];
        }

        // Checking if the database is empty or not
        if($check == 0){
            $admin_id = '100000000000';
        }
        else{
            $admin_id = $admin_idr + 1; //Incrementing ID for new admin
        }

        return $admin_id; // New Admin ID
    }

    // Function to register new admin
    function adminRegister(){

        require('../connect.php'); // Adding connect file for database connection
       
        // Form data stored into variables

        $admin_verification_key = $_POST["averification_key"];
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $date_of_birth = $_POST["date_of_birth"];
        $gender = $_POST["gender"];
        $contact_no = $_POST["contact"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $join_date = date("Y-m-d");

        // Checking if admin verification key is valid or not

        $sqlav = "Select admin_verification_key, generated_by_admin_aid From adminvkeys Where admin_verification_key = '$admin_verification_key';";
        $resultav = mysqli_query($conn, $sqlav);

        while($row = mysqli_fetch_array($resultav)) {
            $avkcheck = $row['admin_verification_key'];
            $supervisor = $row['generated_by_admin_aid'];
        }


        if (empty($avkcheck)){

            // Close Connection
            mysqli_close($conn);

            echo '<script>alert("Admin Verification Key Not Accepted!")</script>';
            echo '<script>window.location= "../Admin/admin_registration.php";</script>';
            exit();
        }

        // Checking if email already exists or not

        $sql = "Select email From admin Where email = '$email';";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result)) {
            $emailcheck = $row['email'];
        }

        if (!empty($emailcheck)){
            
            // Close Connection
            mysqli_close($conn);

            echo '<script>alert("An account with the same email already exists!")</script>';
            echo '<script>window.location= "../Admin/admin_registration.php";</script>';
            exit();
        }

        else{

            // Deleting Admin Verification Key as new admin has already been verified
            $sqlv = "Delete From adminvkeys Where admin_verification_key = '$admin_verification_key';";
            $resultv = mysqli_query($conn, $sqlv);

            $admin_id = generateAdminID();
            $sql1 = "Insert Into admin (aid, first_name, last_name, date_of_birth, gender, contact_no, email, password, join_date, supervisor)
                  Value ('$admin_id', '$first_name', '$last_name', '$date_of_birth', '$gender', '$contact_no', '$email', md5('$password'), '$join_date', '$supervisor');";
            mysqli_query($conn, $sql1);

            // Close Connection
            mysqli_close($conn);

            echo '<script>alert("You have been Registered!")</script>';
            echo'<script>window.location= "../index.php";</script>';
            exit();

        }
        
    }

     // Admin Login: Returns true if Login is Successfull
     function adminLogin(){

        require('../connect.php'); // Adding connect file for database connection

        // Form data stored into variables

        $aid = $_POST["admin_id"];
        $password = $_POST["password"];

        $aid = 100000000000 + $aid; // Last 7 digits used for login combined with basic admin ID's format of 12 digits

        // Fetching Data from database
        $sql0 = "Select aid, password From admin Where aid = '$aid' AND password = md5('$password');";
        $result0 = mysqli_query($conn, $sql0);

        while($row = mysqli_fetch_array($result0)) {
            $aidcheck = $row['aid'];
            $passwordcheck = $row['password'];
        }

        if(!empty($aidcheck) && !empty($passwordcheck)){
            
            // Close Connection
            mysqli_close($conn);

            session_start(); // Session Created
            session_unset(); // remove all session variables

            $_SESSION['aid'] = $aid; // Session variable created for further use
            $_SESSION['password'] = $password; // Session variable created for further use
            
            echo '<script>window.location= "../Admin/admin_profile.php";</script>'; // Redirect to the specified path
            return true; // Login Successfull
            exit();
        }

        else if (empty($aidcheck)){

            // Close Connection
            mysqli_close($conn);

            echo '<script>alert("Admin not registered or password did not match!");</script>';
            echo '<script>window.location= "../Admin/admin_login.php";</script>';
            return false; // Login Unsuccessfull
            exit();
        }

        else if (empty($passwordcheck)){

            // Close Connection
            mysqli_close($conn);

            echo '<script>alert("Password did not match!");</script>';
            echo '<script>window.location= "../Admin/admin_login.php";</script>';
            return false; // Login Unsuccessfull
            exit();
        }
        
    }

    // Function to generate ID for new doctor
    function generateDoctorID(){
        
        require('../connect.php'); // Adding connect file for database connection

        // Fetching Data from database
        $sql0 = "Select count(*) as Count From doctor;";
        $result0 = mysqli_query($conn, $sql0);
        

        while($row = mysqli_fetch_array($result0)) {
            $check = $row['Count'];
          }

        // Checking if the database is empty or not
        if($check == 0){
            $doc_id = '200000000000';
        }
        else{
            $sqle = "Select did from doctor ORDER BY did DESC LIMIT 1;";
            $resulte = mysqli_query($conn, $sqle);
            while($row = mysqli_fetch_array($resulte)) {
                $doc_idr = $row['did'];
            }
            $doc_id = $doc_idr + 1; //Incrementing ID for new admin
        }

        // Close Connection
        mysqli_close($conn);

        return $doc_id; 

    }

    // Admin Adds New Doctor
    function registerDoctor(){

        require('../connect.php'); // Adding connect file for database connection
        session_start(); // Starting session
       
        // Form data stored into variables

        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $date_of_birth = $_POST["date_of_birth"];
        $gender = $_POST["gender"];
        $contact_no = $_POST["contact"];
        $designation = $_POST["designation"];
        $qualification = $_POST["qualification"];
        $university = $_POST["university"];
        $experience_years = $_POST["experience_years"];
        
        $start_time = $_POST["start_time"];
        $finish_time = $_POST["finish_time"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $join_date = date("Y-m-d");
        $admin_creator_aid = $_SESSION['aid'];
        $doctor_initial = $_POST['doctor_initial'];

        // Days Selected
        $sunday = 0;
        $monday = 0;
        $tuesday = 0;
        $wednesday = 0;
        $thursday = 0;
        $friday = 0;
        $saturday = 0;

        if(isset($_POST["sunday"])){
            $sunday = 1;
        }
        if(isset($_POST["monday"])){
            $monday = 1;
        }
        if(isset($_POST["tuesday"])){
            $tuesday = 1;
        }
        if(isset($_POST["wednesday"])){
            $wednesday = 1;
        }
        if(isset($_POST["thursday"])){
            $thursday = 1;
        }
        if(isset($_POST["friday"])){
            $friday = 1;
        }
        if(isset($_POST["saturday"])){
            $saturday = 1;
        }

        // Checking if email already exists or not

        $sql = "Select email From doctor Where email = '$email';";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result)) {
            $emailcheck = $row['email'];
        }

        if (!empty($emailcheck)){

            // Close Connection
            mysqli_close($conn);

            echo '<script>alert("An account with the same email already exists!")</script>';
            echo'<script>window.location= "../Admin/admin_profile.php";</script>';
            exit();
        }

        // Checking if initial already exists or not
        $sql2 = "Select doctor_initial From doctor Where doctor_initial = '$doctor_initial';";
        $result2 = mysqli_query($conn, $sql2);

        while($row = mysqli_fetch_array($result2)) {
            $initialcheck = $row['doctor_initial'];
        }

        if (!empty($initialcheck)){

            // Close Connection
            mysqli_close($conn);

            echo '<script>alert("An account with the same initial already exists!")</script>';
            echo'<script>window.location= "../Admin/admin_profile.php";</script>';
            exit();
        }

        else{

            $did = generateDoctorID();
            $sql1 = "Insert Into doctor (did, first_name, last_name, date_of_birth, gender, contact_no, designation, qualification, university, 
                    experience_years, sunday, monday, tuesday, wednesday, thursday, friday, saturday, start_time, finish_time, email, password, admin_creator_aid, join_date, doctor_initial)
                  Value ('$did', '$first_name', '$last_name', '$date_of_birth', '$gender', '$contact_no', '$designation', '$qualification', '$university', 
                  '$experience_years', '$sunday', '$monday', '$tuesday', '$wednesday', '$thursday', '$friday', '$saturday', '$start_time', '$finish_time','$email', md5('$password'), '$admin_creator_aid', '$join_date', '$doctor_initial');";
            mysqli_query($conn, $sql1);

            // Close Connection
            mysqli_close($conn);

            echo '<script>alert("New doctor has been Registered!")</script>';
            echo'<script>window.location= "../Admin/admin_profile.php";</script>';
            exit();

        }
        
    }

    // Delete Doctor
    function deleteDoctor(){
        require('../connect.php'); // Adding connect file for database connection

        if(isset($_POST['did'])){

            // Doctor ID Required
            $did = $_POST['did'];

            // Checking if doctor id exists or not
            $sql = "Select did From doctor Where did = '$did';";
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_array($result)) {
                $didcheck = $row['did'];
            }

            if (empty($didcheck)){

                // Close Connection
                mysqli_close($conn);

                echo '<script>alert("The entered doctor id does not exist!")</script>';
                echo'<script>window.location= "../Admin/admin_remove_doctor.php";</script>';
                exit();
            }

            // Deleting doctor
            $sqld = "Delete From doctor Where did = '$did';";
            $resultd = mysqli_query($conn, $sqld);

            // Close Connection
            mysqli_close($conn);

            echo '<script>alert("Doctor Deleted Successfully!")</script>';
            echo'<script>window.location= "../Admin/admin_remove_doctor.php";</script>';

        }

        else{
            echo'<script>window.location= "../Admin/admin_remove_doctor.php";</script>';
            exit();
        }

        

    }

    
    
    

    

    
    
    

?>