<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Styles/doctors.css">
    <title>Doctors Page</title>
</head>

<body>

    <?php
        // Navbar included
        include('navbar.php');
    ?>

    <!--Main Section-->

    <div class="main-heading">
        <h2>Our Doctors</h2>
    </div>

    <div class="body2">
        <div class="main-doctor">
            <div class="doctor">
                <div class="doctor-card">
                   
                    <figure>
                        <img src="images/doctor/male doctor.jpg" alt=""> 
                        <!--Description-->  
                        <h4>
                        <b>Qualification:</b> MBBS (DMC), FCPS (Medicine), MD (Internal Medicine), FACP (USA)<br>
                        <b>Designation:</b> Medicine Specialist<br>
                        <b>Schedule:</b> MW (4.00 PM - 6.00 PM)<br>
                        <b>Experience:</b> 13 years</h4>
                        <!--Name--> 
                        <h3>Prof. Dr. Ahmed Omar</h3>
                    </figure>
                    
                </div>

                <div class="doctor-card">
                   
                    <figure>
                        <img src="images/doctor/female doctor.jpg" alt=""> 
                        <!--blockquote-->  
                        <h4>
                        <b>Qualification:</b> MBBS, FRCS, FRCOG, FRCP, FCPS (PK), FCPS (BD)<br>
                        <b>Designation:</b> Gynecology & Infertility Specialist<br>
                        <b>Schedule:</b> ST (4.00 PM - 6.00 PM)<br>
                        <b>Experience:</b> 8 years</h4>
                        <!--Name--> 
                        <h3>Prof. Dr. Tania Masud</h3>
                    </figure>
                  
                </div>

                <div class="doctor-card">
                    <figure>
                        <img src="images/doctor/male doctor.jpg" alt=""> 
                        <!--Description-->
                        <h4>
                        <b>Qualification:</b> MBBS, FCPS (Pediatric Neurology)<br>
                        <b>Designation:</b> Child Neurological Disorders, Development & Autism Specialist<br>
                        <b>Schedule:</b> ST (9.00 AM - 11.00 AM)<br>
                        <b>Experience:</b> 18 years</h4>
                        <!--Name--> 
                        <h3>Prof. Dr. Tammam Azmain</h3>
                    </figure>
                   
                </div>

                <div class="doctor-card">
                    
                    <figure>
                        <img src="images/doctor/female doctor.jpg" alt=""> 
                        <!--Description-->  
                        <h4>
                        <b>Qualification:</b> MBBS, DGO, FCPS (OBGYN)<br>
                        <b>Designation:</b> Gynecology, Obstetrics Specialist & Laparoscopic Surgeon<br>
                        <b>Schedule:</b> MW (10.00 AM - 2.00 PM)<br>
                        <b>Experience:</b> 15 years</h4>
                        <!--Name-->  
                        <h3>Dr. Abasha Khan</h3>
                    </figure>
                </div>

                <div class="doctor-card">
                    <figure>
                        <img src="images/doctor/male doctor.jpg" alt=""> 
                        <!--Description-->  
                        <h4>
                        <b>Qualification:</b> MBBS, MD (Radiation Oncology)<br>
                        <b>Designation:</b> Cancer Specialist<br>
                        <b>Schedule:</b> RA (9.00 AM - 12.00 PM)<br>
                        <b>Experience:</b> 9 years</h4>
                        <!--Name--> 
                        <h3>Dr. Md. Abdul Wahab</h3>
                    </figure>
                </div>

                <div class="doctor-card">
                    <figure>
                        <img src="images/doctor/male doctor.jpg" alt=""> 
                        <!--Description-->  
                        <h4>
                        <b>Qualification:</b> BDS (SOMC), PGT (OMS)<br>
                        <b>Designation:</b> Oral, Dental & Maxillofacial Surgery Specialist<br>
                        <b>Schedule:</b> ST (11.00 AM - 2.00 PM)<br>
                        <b>Experience:</b> 12 years</h4>
                        <!--Name--> 
                        <h3>Prof. Dr. Maruf Islam</h3>
                    </figure>
                </div>
                
            </div>
        </div>
    </div>

    <!--Footer Section-->
    <div class="footer bg-dark">
        <p>Copyright 2022 by Cymed. All Rights Reserved.</p>
    </div>
</body>
</html>