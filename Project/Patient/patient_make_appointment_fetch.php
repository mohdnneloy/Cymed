<?php

	include('../connect.php');
    session_start();

    $ddisplay='';
    $ndisplay='';
    $ddydisplay='';
    $dadisplay='';
    $tdisplay='';

    // If all set the submit the appointment, instead of name we are using the doctor id or 'did'
    if(!empty($_POST['specialist']) && !empty($_POST['did']) && !empty($_POST['day']) && !empty($_POST['date']) && !empty($_POST['time'])){
        
        $ap_date = $_POST['date'];
        $ap_time = $_POST['time'];
        $did = $_POST['did'];
        $email = $_SESSION['email'];

        $sql5 = "Select pid From patient Where email = '$email';";
        $result5 = mysqli_query($conn, $sql5);

        while($row = mysqli_fetch_array($result5)) {
            $pid = $row['pid'];
        }

        // Calculating max appointments possible "available time" for the given time 
        $sql7 = "SELECT start_time, finish_time FROM doctor WHERE did = '$did';";
        $result7 = mysqli_query($conn, $sql7);

        while($row = mysqli_fetch_array($result7)) {
            $start_time = date("H:i", strtotime($row["start_time"]));
            $temp_time = $start_time;
            $finish_time = date('H:i', strtotime('-30 minutes', strtotime($row["finish_time"])));
        }

        $max_appointments = 0;

        while($temp_time < $finish_time){
            
            $max_appointments = $max_appointments + 4; // Max appointments per day
            $temp_time = date('H:i', strtotime('+30 minutes', strtotime($temp_time)));
            
        }

        // Checking if the patient has an appointment already on that date
        $sql8 = "SELECT COUNT(*) as Count FROM appointment WHERE ap_date='$ap_date' AND pid='$pid';";
        $result8 = mysqli_query($conn, $sql8);

        while($row = mysqli_fetch_array($result8)) {
            $ap_count = $row['Count'];
        }

        if($ap_count == 1){
            echo'<script>alert("You already have an appointment on this date!")</script>';
            echo '<script>window.location= "patient_make_appointment.php";</script>';
            exit();
        }

        // Total appointments on a date for a specific doctor already filled
        $sql6 = "SELECT COUNT(*) as Count FROM appointment WHERE ap_date='$ap_date';";
        $result6 = mysqli_query($conn, $sql6);

        while($row = mysqli_fetch_array($result6)) {
            $ap_count = $row['Count'];
        }

        if($ap_count < $max_appointments){

            // Maximum of 4 appointments per 30 minutes
            $sql4 = "SELECT COUNT(*) as Count FROM appointment WHERE ap_date='$ap_date' AND did='$did' AND ap_time='$ap_time';";
            $result4 = mysqli_query($conn, $sql4);

            while($row = mysqli_fetch_array($result4)) {
                $ap_count = $row['Count'];
            }

            if($ap_count < 4){

                // Generating Serial_No for the initial appointment of a particulat slot
                if($ap_count == 0){

                    $ap_count = 1;
                    
                    if($result7){
            
                        $temp_time = $start_time;

                        while($temp_time < $ap_time){
                            
                            $ap_count = $ap_count + 4;
                            $temp_time = date('H:i', strtotime('+30 minutes', strtotime($temp_time)));
                        }
                    }

                }

                else{
                    
                    // Get the last serial number for an specific time slot, date and doctor
                    $sql10 = "SELECT serial_no FROM appointment WHERE ap_date='$ap_date' AND did='$did' AND ap_time='$ap_time' ORDER BY serial_no DESC LIMIT 1;";
                    $result10 = mysqli_query($conn, $sql10);

                    while($row = mysqli_fetch_array($result10)) {
                        $ap_count = $row['serial_no'];
                    }

                    $ap_count = $ap_count + 1;

                }
                
                $serial_no = $ap_count; 
                $sql9 = "Insert Into appointment (serial_no, pid, did, ap_date, ap_time)
                    Value ('$serial_no', '$pid', '$did', '$ap_date', '$ap_time');";
                mysqli_query($conn, $sql9);

                $sql11 = "Insert Into appointment_save (serial_no, pid, did, ap_date, ap_time)
                    Value ('$serial_no', '$pid', '$did', '$ap_date', '$ap_time');";
                mysqli_query($conn, $sql11);

                // CLose Connection
                mysqli_close($conn);

                echo '<script>window.location= "patient_appointments.php";</script>';
                
            }

            else{

                // CLose Connection
                mysqli_close($conn);

                echo'<script>alert("This time slot is full! Please select another time!")</script>';
                echo '<script>window.location= "patient_make_appointment.php";</script>';
            }

        }

        else{

            // CLose Connection
            mysqli_close($conn);

            echo'<script>alert("All slots are full for this date! Please try another date!")</script>';
            echo '<script>window.location= "patient_make_appointment.php";</script>';
        }
          
    }

    // If all set the submit the appointment, instead of name we are using the doctor id or 'did'
    else if(!empty($_POST['specialist']) && !empty($_POST['did']) && !empty($_POST['day']) && !empty($_POST['date'])){
        
        $did = $_POST['did'];
        $query3="SELECT start_time, finish_time FROM doctor WHERE did = '$did';";
        $result3= mysqli_query($conn, $query3);

        $tdisplay .='<br> <select class="form-select" id="dtime" aria-label="Default select example"  name="time" required>
                            <option selected value="">Select your preffered Time</option>';

        if(mysqli_num_rows($result3) != 0){
            
            while($row=mysqli_fetch_array($result3)){
                $start_time = date("H:i", strtotime($row["start_time"]));
                $temp_time = $start_time;
                $finish_time = date('H:i', strtotime('-30 minutes', strtotime($row["finish_time"])));
            }

            $tdisplay .=' <option value="'.$start_time.'">'.$start_time.'</option>';

            while($temp_time < $finish_time){
                
                $temp_time = date('H:i', strtotime('+30 minutes', strtotime($temp_time)));
                $tdisplay .=' <option value="'.$temp_time.'">'.$temp_time.'</option>';
            }

            $tdisplay .= '</select>';
            $tdisplay .= '<button type="submit" class="btn btn-primary submit-btn">Submit</button>';
            echo $tdisplay;

            // Closing Connection
            mysqli_close($conn);
            
        }

        else{

            // Closing Connection
            mysqli_close($conn);

            echo "<h3>Data Not Found!</h3>";
        }

    }

    // If all upto days is selected in the form, the select the appointment date available
    else if(!empty($_POST['specialist']) && !empty($_POST['did']) && !empty($_POST['day'])){

        $did = $_POST['did'];
        $day = $_POST['day'];
        $daynumber = 0;
        

        switch ($day) {
            case 'Sunday':
                $daynumber = 0;
            break;

            case 'Monday':
                $daynumber = 1;
            break;

            case 'Tuesday':
                $daynumber = 2;
            break;

            case 'Wednesday':
                $daynumber = 3;
            break;

            case 'Thursday':
                $daynumber = 4;
            break;

            case 'Friday':
                $daynumber = 5;
            break;

            case 'Saturday':
                $daynumber = 6;
            break;

            default:
              echo "<h3> Day Not Found!</h3>"; exit();
          }

        $dadisplay .='<br> <select class="form-select" id="ddate" aria-label="Default select example" name="date" required>
                        <option selected value="">Select Date</option>';
        
        // Finding next 5 possible days for appoingment
        for($i=0; $i<=4; $i++){

            // If current day is same as selected
            if(date("w") == $daynumber){

                    $temp = $i+1;
                    $dadisplay .=' <option value="'.date('Y-m-d', strtotime("+$temp week $day")).'">'.date('Y-m-d', strtotime("+$temp week $day")).'</option>';
            }

            else{
                $dadisplay .=' <option value="'.date('Y-m-d', strtotime("+$i week $day")).'">'.date('Y-m-d', strtotime("+$i week $day")).'</option>';
            }
        }
       

        $dadisplay .='</select>';

        echo $dadisplay;

        // Closing Connection
        mysqli_close($conn);

    }

    // If specialist and name is set then display the number of days and time, instead of name we are using the doctor id or 'did'
    else if(!empty($_POST['specialist']) && !empty($_POST['did'])){

        $did = $_POST['did'];
        $query2="SELECT * FROM doctor WHERE did = '$did';";

        $result2= mysqli_query($conn, $query2);

        if(mysqli_num_rows($result2) != 0){

            $ddydisplay .='<br> <select class="form-select" id="dday" aria-label="Default select example" name="day" required>
                            <option selected value="">Select your preffered Day of Appointment</option>';

            while($row=mysqli_fetch_array($result2)){

                if ($row["sunday"] == 1){

                    $ddydisplay .=' <option value="Sunday">Sunday</option>';
                }

                if ($row["monday"] == 1){

                    $ddydisplay .=' <option value="Monday">Monday</option>';
                }

                if ($row["tuesday"] == 1){

                    $ddydisplay .=' <option value="Tuesday">Tuesday</option>';
                }

                if ($row["wednesday"] == 1){

                    $ddydisplay .=' <option value="Wednesday">Wednesday</option>';
                }

                if ($row["thursday"] == 1){
                    
                    $ddydisplay .=' <option value="Thursday">Thursday</option>';
                }

                if ($row["friday"] == 1){

                    $ddydisplay .=' <option value="Friday">Friday</option>';
                }

                if ($row["saturday"] == 1){

                    $ddydisplay .=' <option value="Saturday">Saturday</option>';
                }

                
            }

            $ddydisplay .='</select>';

            echo $ddydisplay;

            // Closing Connection
            mysqli_close($conn);
        }

        else{

            // Closing Connection
            mysqli_close($conn);

            echo "<h3>Data Not Found!</h3>";
        }
    }


    // If specialist is set means then we need to select the doctor name, instead of name we are using the doctor id or 'did'
    else if(!empty($_POST['specialist'])){

        $specialist = $_POST["specialist"];
        $query1="SELECT did, first_name, last_name FROM doctor WHERE designation = '$specialist' ORDER BY did ;";

        $result1= mysqli_query($conn, $query1);

        if(mysqli_num_rows($result1) != 0){

            $ndisplay .='<br> <select class="form-select" id="ddid" aria-label="Default select example" name="did" required>
                            <option selected value="">Select Doctor</option>';

            while($row=mysqli_fetch_array($result1)){

                $ndisplay .=' <option value="'.$row["did"].'">'.$row["first_name"]." ".$row["last_name"].'</option>';
            }

            $ndisplay .='</select>';

            echo $ndisplay;

            // Closing Connection
            mysqli_close($conn);
                
        }

        else{

            // Closing Connection
            mysqli_close($conn);

            echo "<h3>Data Not Found!</h3>";
        }
    }

    // If page has just realoaded
    else{

        $query0="SELECT DISTINCT designation FROM doctor ORDER BY did";

        $result0= mysqli_query($conn, $query0);

        if(mysqli_num_rows($result0) != 0){

            $ddisplay .='<select class="form-select" id="dspecialist" aria-label="Default select example" name="specialist" required>
                            <option selected value="">Select Specialist</option>';

            while($row=mysqli_fetch_array($result0)){

                $ddisplay .=' <option value="'.$row["designation"].'">'.$row["designation"].'</option>';
            }

            $ddisplay .='</select>';

            echo $ddisplay;

            // Closing Connection
            mysqli_close($conn);
                
        }

        else{
            
            // Closing Connection
            mysqli_close($conn);

            echo "<h3>Data Not Found!</h3>";
        }

    }

    
    

?>