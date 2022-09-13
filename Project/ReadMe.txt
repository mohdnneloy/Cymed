// PHP Commands =================================

# Run the PHP Server
    - Go to the directory of the project and run the command "php -S localhost:8000"

// Install Composer for Sending SMS

# Setup of Composer - "https://www.youtube.com/watch?v=YISTHhBdcS8&t=695s"
    - Download the package installer -> "https://getcomposer.org/Composer-Setup.exe"
    - Install it
    - Check version in terminal in your root directory and run command "composer --version" to check the version
    - On terminal use the command "composer require messagebird/php-rest-api", now some files will be downloaded in the root directory
    - One JSON, One Lock File and a vendor folder will be downloaded
    - Delete the JSON and Lock file
    - Move the "vendor forder to your project"
    - Follow the rest of the documentation here - "https://developers.messagebird.com/quickstarts/sms/send-sms-php"
    - You will find the developer key in the "developer section" of your dashboard "Access API->Live API Key" Use it for the API key

// Google Authentication Setup

# Google Auth Package Installation
    - Run the Command to install the google auth library to your folder "composer require google/apiclient:"^2.10""

# Setup Google Authentication Requirements in Google Cloud Platform OAuth
  - Watch this video: https://www.youtube.com/watch?v=i5IybpgcInY&t=920s
