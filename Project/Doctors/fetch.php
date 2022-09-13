<?php

	include('../connect.php');

    $display='';


    if(isset($_POST["dname"])){
        echo '<script>console.log("Entered");</script>';
        $dname=mysqli_real_escape_string($conn, $_POST["dname"]);
        $query="SELECT * FROM doctor WHERE first_name LIKE '%".$dname."%' OR last_name LIKE '%".$dname."%'";
    }

    else{
        $query="SELECT * FROM doctor ORDER BY did";
    }

    $result= mysqli_query($conn, $query);

    if($result){

        

        while($row=mysqli_fetch_array($result)){

            $sunday = $row["sunday"];
            $monday = $row["monday"];
            $tuesday = $row["tuesday"];
            $wednesday = $row["wednesday"];
            $thursday= $row["thursday"];
            $friday= $row["friday"];
            $saturday = $row["saturday"];

            // Days String

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

    $days[strlen($days)-2] = ' ';

            if($row['gender']  == 'Male'){
                $display .= '<div class="doctor-card">
                        <figure>
                            <img src="images/doctor/male doctor.jpg" alt="" width="30%"> 
                            ';
            }

            else if ($row['gender'] == 'Female'){
                $display .= '<div class="doctor-card">
                        <figure>
                            <img src="images/doctor/female doctor.jpg" alt="" width="30%"> 
                            ';
            }

            
            
            $start_time = $row["start_time"];
            $finish_time = $row["finish_time"];
            $experience_years = $row["experience_years"];

            $display .='
                        <!--Name--> 
                        <p style="margin-top: 2%;"> <b>'.$row["first_name"]. ' ' .$row["last_name"].'</b></p>
                        <!--Description-->  
                        <p style="margin-top: -2%;">
                        '.$row["designation"].'<br>
                        '.$row["qualification"].'<br>
                        Days: '.$days.'<br>
                        Timings: '.date("h:ia", strtotime($start_time)). " to ". date("h:ia", strtotime($finish_time)).'<br>
                        '.$experience_years.' Years of Experience</p>
                    </div>
                </figure>   
            </div>';
        }

        echo $display;
            
    }

    else{
        echo nl2br("\nData not found"); // Return string with <br> tag included
    }

?>