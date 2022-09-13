<html> 
    <head> 
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="Styles/doctors.css">

        <!-- Scripts only -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> <!-- Need to be loaded befor the ajax is run-->
        <script type="text/javascript" src="Doctors/function_fetch.js" async></script>
        
        <title>Doctors</title>
    </head> 
        <body> 

            <?php
            // Navbar included
            include('navbar.php');
            ?>

            <div class="container"> 
                <h2>Search</h2><br /> 

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Doctor Name: </span>
                    </div>
                    <input type="text" class="form-control" name="dname" id="dname" placeholder="Enter doctors name" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div id="result"></div> 
                <br><br><br><br><br>
            </div>

            <!-- Footer Section -->
            <div class="footer bg-dark" loading='lazy'>
                <p>Copyright 2022 by Cymed. All Rights Reserved.</p>
            </div>

        </body>
    </html>
