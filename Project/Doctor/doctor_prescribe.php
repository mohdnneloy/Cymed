<?php

    include('../connect.php'); // Include database connection file
    session_start();

    // If logged out and session variables are empty then return to login page
    if(empty($_SESSION['did'])){
        
        echo '<script>window.location= "doctor_login.php";</script>';
        exit();
    }

    // If all the fields are filled then insert data into the database
    if(!empty($_POST['apid']) && !empty($_POST['did']) && !empty($_POST['pid']) && !empty($_POST['symptoms']) && !empty($_POST['tests']) && !empty($_POST['medicines'])){

        $apid = $_POST['apid'];
        $did = $_POST['did'];
        $pid = $_POST['pid'];
        $symptoms = $_POST['symptoms'];
        $pos = $_POST['pos'];
        $tests = $_POST['tests'];
        $medicines = $_POST['medicines'];
        $date = date("Y-m-d");

        // Insert all the data into the database
        $sql2 = "Insert Into prescription (apid, did, pid, symptoms, pos, tests, medicines, prescription_date)
                Value ('$apid', '$did', '$pid', '$symptoms', '$pos', '$tests', '$medicines', '$date');";
        mysqli_query($conn, $sql2);

        // Delete the appointment from the appointment table once the prescription is written
        $sql3 = "DELETE FROM appointment WHERE apid = '$apid';";
        $result3 = mysqli_query($conn, $sql3);
    }

    // Only if the appointment ID is filled then display prescription form
    else if(!empty($_POST['apid'])){

        $display = ''; // Response String
        $apid = $_POST['apid'];
        
        // Obtain patient ID from the given appointment ID
        $query0 = "SELECT * FROM appointment WHERE apid = $apid";
        $result0 = mysqli_query($conn, $query0);
        
        if($result0){
            while($row=mysqli_fetch_array($result0)){
                $pid = $row['pid'];
            }
        }

        $did = $_SESSION['did']; // Doctor ID of the logged in doctor

        // Retrieve patient details
        $query1="SELECT * FROM patient WHERE pid='$pid';";
        $result1= mysqli_query($conn, $query1);

        while($row=mysqli_fetch_array($result1)){
            $pfirst_name = $row["first_name"];
            $plast_name = $row["last_name"];
            $pdob = $row["date_of_birth"];
        }

        // Calculating age
        $today = date("Y-m-d");
        $page = date_diff(date_create($pdob), date_create($today));

        // Prescripttion form
        $display = ' <div class="heading">
                        <h3>Prescription</h3>
                    </div>

                    <div class="register-form">
                        
                        <form class="form-aregister" action="" method="POST">

                            <div class="form-group">
                                   <h3>Prescription</h3>
                            </div>

                            <div class="form-group">
                                <pre><b>Name:</b> <span>'.$pfirst_name." ". $plast_name.'</span>   <b>Age:</b> <span>'.$page->format('%y').'</span></pre>
                            </div>

                            <div class="form-group">
                                <label for="symptoms">Symptoms</label>
                                <textarea class="form-control" id="symptoms" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="pos">Previous Operations or Sickness</label>
                                <textarea class="form-control" id="pos" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="tests">Tests</label>
                                <textarea class="form-control" id="tests" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="medicines">Medicines</label>
                                <textarea class="form-control" id="medicines" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success submit-btn" onclick="return submitPrescription('.$apid.', '.$did.', '.$pid.')">Prescribe</button>
                                <button class="btn btn-danger submit-btn" onclick="return goBack()"> Go Back</button>
                            </div>
                                
                        </form>
                    </div>';

        echo $display; // Send HTML response

        // Closing Connection
        mysqli_close($conn);
        
    }

    // If all the fields are empty
    else{
        echo "All the fields are empty!";
    }
?>