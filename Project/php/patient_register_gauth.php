<?php

    require("../GAuth/vendor/autoload.php");
    require("../connect.php");
    require("patient_functions.php");

    //Make object of Google API Client for call Google API
    $google_client = new Google_Client();

    //Set the OAuth 2.0 Client ID
    $google_client->setClientId('Your Client ID');

    //Set the OAuth 2.0 Client Secret key
    $google_client->setClientSecret('Your Client Secret');

    //Set the OAuth 2.0 Redirect URI
    $google_client->setRedirectUri('Your RedirectURL');

    // Add Scopes
    $google_client->addScope('email');
    $google_client->addScope('profile');

    if(isset($_GET["code"])){


        //It will Attempt to exchange a code for an valid authentication token.
        $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

        //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
        if(!isset($token['error'])){

            //Set the access token used for requests
            $google_client->setAccessToken($token['access_token']);

            //Store "access_token" value in $_SESSION variable for future use.
            $access_token = $token['access_token'];

            //Create Object of Google Service OAuth 2 class
            $google_service = new Google_Service_Oauth2($google_client);

            //Get user profile data from google
            $data = $google_service->userinfo->get();

            //Below you can find Get profile data and store into $_SESSION variable
            if(!empty($data['given_name'])){
                $gfirst_name = $data['given_name'];

            }

            if(!empty($data['family_name'])){
                $glast_name = $data['family_name'];

            }

            if(!empty($data['email'])){
                $gmail = $data['email'];

            }


            // Register Obtained Data

            // Form data stored into variables
            $first_name = $gfirst_name;
            $last_name = $glast_name;
            $email = $gmail;
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
                $sql1 = "Insert Into patient (pid, first_name, last_name, email, join_date)
                    Value ('$patient_id', '$first_name', '$last_name', '$email', '$join_date');";
                mysqli_query($conn, $sql1);

                // Close Connection
                mysqli_close($conn);

                echo '<script>alert("You have been Registered!")</script>';
                echo'<script>window.location= "../index.php";</script>';
                exit();
            }
        }
    }

    //This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
    if(!isset($access_token)){

    // Redirect to the generated URL to obtain email for authorization
    echo '<script>window.location= "'.$google_client->createAuthUrl().'";</script>';
    }

?>
