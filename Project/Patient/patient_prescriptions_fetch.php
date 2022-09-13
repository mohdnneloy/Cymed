<?php

    include('../connect.php');
    session_start();

    $display = ''; 
    $email = $_SESSION['email']; 

    // Fetching Data from database
    $sql0 = "SELECT * From patient Where email = '$email'";
    $result0 = mysqli_query($conn, $sql0);

    while($row = mysqli_fetch_array($result0)){ 
        $pid = $row["pid"];
    }  

    if(!empty($_POST['prid'])){

        $prid = $_POST['prid'];

        $sql4 = "SELECT * From prescription Where prid = '$prid'";
        $result4 = mysqli_query($conn, $sql4);

        while($row1=mysqli_fetch_array($result4)){

            $did = $row1["did"];

            // Finding the doctor name
            $query3="SELECT first_name, last_name, designation FROM doctor WHERE did='$did';";
            $result3= mysqli_query($conn, $query3);

            while($row=mysqli_fetch_array($result3)){
                $dfirst_name = $row["first_name"];
                $dlast_name = $row["last_name"];
                $ddesignation = $row["designation"];
            }

            $display .='
                                <div class="heading2">
                                    <h3>Prescriptions</h3>
                                </div>

                                <br>

                                <div class="prescriptions2" id="prescriptions">
                        
                                <div class="card">

                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><b>Prescription ID: </b> '.$prid.'</li>
                                        <li class="list-group-item"><b>Appointment ID: </b> '.$row1["apid"].'</li>
                                        <li class="list-group-item"><b>Doctor Name: </b> '.($dfirst_name).' '.$dlast_name.'</li>
                                        <li class="list-group-item"><b>Date: </b> '.$row1["prescription_date"].'</li>
                                        <li class="list-group-item"><b>Speciality: </b> '.$ddesignation.'</li>
                                        <li class="list-group-item"><b>Symptoms: </b> '.nl2br($row1["symptoms"]).'</li>
                                        <li class="list-group-item"><b>Previous Operations or Sickness: </b> '.nl2br($row1["pos"]).'</li>
                                        <li class="list-group-item"><b>Tests: </b> '.nl2br($row1["tests"]).'</li>
                                        <li class="list-group-item"><b>Medicines: </b> '.nl2br($row1["medicines"]).'</li>
                                    </ul>
                                </div>
                                <br>
                                <button class="btn btn-danger submit-btn" onclick="return goBack()">Go Back</button>

                        ';
            
        }

        $display .='</div>';

        echo $display;

        // Closing Connection
        mysqli_close($conn);


    }

    else{

        $sql1 = "SELECT * From prescription Where pid = '$pid'";
        $result1 = mysqli_query($conn, $sql1);

        if(mysqli_num_rows($result1) != 0){

            $display .=' <br>
                                <div class="heading">
                                    <h3>Prescriptions</h3>
                                </div>
                                <br>

                                <div class="prescriptions" id="prescriptions">
                        
                                    <table class="table">
                                        <thead>
                                            <tr>
                                            <th scope="col">Prescription No.</th>
                                            <th scope="col">Prescription ID</th>
                                            <th scope="col">Appointment ID</th>
                                            <th scope="col">Doctor Name</th>
                                            <th scope="col">Speciality</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                        ';

            $pr_no = 1;
            while($row1=mysqli_fetch_array($result1)){
                
                
                $did = $row1["did"];

                // Finding the doctor name
                $query2="SELECT first_name, last_name, designation FROM doctor WHERE did='$did';";
                $result2= mysqli_query($conn, $query2);

                while($row=mysqli_fetch_array($result2)){
                    $dfirst_name = $row["first_name"];
                    $dlast_name = $row["last_name"];
                    $ddesignation = $row["designation"];
                }

                $display .='<tr>
                                <th scope="row">'.$pr_no.'</th>
                                <td>'.$row1["prid"].'</td>
                                <td>'.$row1["apid"].'</td>
                                <td>'.$dfirst_name.' '.$dlast_name.'</td>
                                <td>'.$ddesignation.'</td>
                                <td>'.$row1["prescription_date"].'</td>
                                <td><button type="button" class="btn btn-primary" id="'.$row1["prid"].'" onclick=" return details('.$row1["prid"].')" value="'.$row1["prid"].'">Details</button></td>
                            </tr>';
                $pr_no = $pr_no + 1;
            }

            $display .='</tbody>
                        </table>
            </div>';

            echo $display;

            // Closing Connection
            mysqli_close($conn);
                
        }

        else{

            echo '  <div class="heading">
                        <h3>Prescriptions</h3>
                    </div>
                
                <div class="prescriptions" id="prescriptions">
                    <h4 style="margin-top: 2%">You have no prescriptions yet!</h4> 
                </div>';
        
            // Closing the connection
            mysqli_close($conn);
        }
    }

    
?>
