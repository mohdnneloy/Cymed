<?php

    include('../connect.php');
    session_start();

    if(!empty($_POST['apid'])){
        $apid = $_POST['apid']; 
        $sqlv = "DELETE FROM appointment WHERE apid = '$apid';";
        $resultv = mysqli_query($conn, $sqlv);
        exit();
    }
    
    $did = $_SESSION['did'];
    $display = '';


    // Find the appointments for the particular doctor
    $query1="SELECT * FROM appointment WHERE did='$did' ORDER BY ap_date, serial_no;";
    $result1= mysqli_query($conn, $query1);

    if(mysqli_num_rows($result1)!=0){

        // Appointment details table headers
        $display .=' <br>
                            <div class="heading">
                                <h3>Appointments</h3>
                            </div>

                            <div class="appointments" id="appointments">
                    
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">Appointment No.</th>
                                        <th scope="col">Serial No.</th>
                                        <th scope="col">Patient Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                    ';
        $ap_no = 1;

        // Display appointment details
        while($row1=mysqli_fetch_array($result1)){
            
            
            $pid = $row1["pid"];

            // Finding the patient name
            $query2="SELECT first_name, last_name FROM patient WHERE pid='$pid';";
            $result2= mysqli_query($conn, $query2);

            while($row=mysqli_fetch_array($result2)){
                $pfirst_name = $row["first_name"];
                $plast_name = $row["last_name"];
            }

            $display .='<tr>
                            <th scope="row">'.$ap_no.'</th>
                            <td>'.$row1["serial_no"].'</td>
                            <td>'.$pfirst_name.' '.$plast_name.'</td>
                            <td>'.$row1["ap_date"].'</td>
                            <td>'.$row1["ap_time"].'</td>
                            <td><button type="button" class="btn btn-success" id="'.$row1["apid"].'" onclick=" return clickButton('.$row1["apid"].')" value="'.$row1["apid"].'">Prescribe</button></td>
                        </tr>';
            $ap_no = $ap_no + 1;
        }

        $display .='</tbody>
                    </table>
        </div>';

        echo $display;

        // Closing the connection
        mysqli_close($conn);
            
    }

    else{
        echo ' <div class="heading">
                    <h3>Appointments</h3>
                </div>

                <div class="appointments" id="appointments">
                    <h3 style="margin-top: 2%">You have no appointments scheduled!</h3> 
                </div>';

        // Closing the connection
        mysqli_close($conn);
    }
?>
