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

            if(!empty($data['email'])){
                $gmail = $data['email'];
            }


            // Fetching Data from database
            $sql0 = "Select email, password From patient Where email = '$gmail';";
            $result0 = mysqli_query($conn, $sql0);

            while($row = mysqli_fetch_array($result0)) {
                $emailcheck = $row['email'];
            }

            if(!empty($emailcheck)){

                session_start(); // Session Created
                session_unset(); // remove all session variables

                $_SESSION['email'] = $gmail; // Session variable created for further use

                // Close Connection
                mysqli_close($conn);

                echo '<script>window.location= "../Patient/patient_profile.php";</script>'; // Redirect to the specified path
                return true; // Login Successfull
                exit();
            }

            else if (empty($emailcheck)){

                // Close Connection
                mysqli_close($conn);

                echo '<script>alert("Email is not registered");</script>';
                echo '<script>window.location= "../Patient/patient_login.php";</script>';
                return false; // Login Unsuccessfull
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
