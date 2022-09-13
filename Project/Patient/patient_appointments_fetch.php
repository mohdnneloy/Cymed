<?php

    include('../connect.php');
    session_start();

    if(!empty($_POST['apid'])){
        $apid = $_POST['apid']; 
        $sqlv = "DELETE FROM appointment WHERE apid = '$apid';";
        $resultv = mysqli_query($conn, $sqlv);
        exit();
    }
    
    $email = $_SESSION['email'];
    $display = '';

    // Find the pid for the logged in patient
    $query0 = "SELECT pid FROM patient WHERE email='$email'";
    $result0 = mysqli_query($conn, $query0);

    if($result0){
        while($row = mysqli_fetch_array($result0)){
            $pid = $row['pid'];
        }
    }

    else{
        echo'<script>alert("Patient not identified!")</script>';
        echo '<script>window.location= "patient_profile.php";</script>';
    }

    // Find the appointments for the particular patient
    $query1="SELECT * FROM appointment WHERE pid='$pid' ORDER BY ap_date, ap_time;";
    $result1= mysqli_query($conn, $query1);

    if(mysqli_num_rows($result1) != 0){

        // Headers of the table
        $display .=' <br>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Appointment No.</th>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Doctor Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        ';
        $ap_no = 1;

        while($row1=mysqli_fetch_array($result1)){
            
            
            $did = $row1["did"];

            // Finding the doctor name
            $query2="SELECT first_name, last_name FROM doctor WHERE did='$did';";
            $result2= mysqli_query($conn, $query2);

            while($row=mysqli_fetch_array($result2)){
                $dfirst_name = $row["first_name"];
                $dlast_name = $row["last_name"];
            }

            // Appointment Details
            $display .='<tr>
                            <th scope="row">'.$ap_no.'</th>
                            <td>'.$row1["serial_no"].'</td>
                            <td>'.$dfirst_name.' '.$dlast_name.'</td>
                            <td>'.$row1["ap_date"].'</td>
                            <td>'.$row1["ap_time"].'</td>
                            <td><button type="button" class="btn btn-danger" id="'.$row1["apid"].'" onclick=" return clickButton('.$row1["apid"].')" value="'.$row1["apid"].'">Cancel</button></td>
                        </tr>';
            $ap_no = $ap_no + 1;
        }

        $display .='</tbody>
                    </table>';

        echo $display;
            
    }

    else{
        echo '  <div class="appointments" id="appointments">
                    <h3 style="margin-top: 2%">You have no appointments scheduled!</h3> 
                </div>';
        
        // Closing the connection
        mysqli_close($conn);
    }
?>
