<?php
require_once 'aes_helper.php';
require_once 'auth.php';
require_once 'db.php'; 

$email = $_POST['email'];
$password = $_POST['password'];


if (validate_credentials($email, $password, $conn)) {

    session_start();


    $_SESSION['email'] = $email;

    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Login Success</title>
       
    </head>
    <body>
        <div class='container'>
            <h1>Login Successful!</h1>
            <a href='home.php'><button>Get Started</button></a>
        </div>
    </body>
    </html>
    ";
} else {
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Login Failed</title>
        <style>
            /* Background Gradient Animation */
            body {
                font-family: Arial, sans-serif;
                background: linear-gradient(135deg, #FF5F6D, #FFC371);
                background-size: 400% 400%;
                animation: backgroundGradient 10s ease infinite;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }

            @keyframes backgroundGradient {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }

            /* Container Styling */
            .container {
                background-color: rgba(255, 255, 255, 0.9);
                padding: 40px;
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                text-align: center;
                width: 350px;
            }

            /* Heading and Error Message */
            h1 {
                font-size: 2rem;
                color: #dc3545;
                margin-bottom: 20px;
            }

            p {
                color: #dc3545;
                font-size: 1.2rem;
                margin-bottom: 20px;
            }

            /* Retry Link */
            a {
                display: inline-block;
                margin-top: 20px;
                color: #007bff;
                text-decoration: none;
                font-size: 1.1rem;
            }

            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h1>Login Failed</h1>
            <p>Invalid email or password.</p>
            <a href='login.php'>Try Again</a>
        </div>
    </body>
    </html>
    ";
}
?>
 <style>
            /* Background Gradient Animation */
            body {
                font-family: Arial, sans-serif;
                background: linear-gradient(135deg, #f5a623, #f06b6b, #845EC2, #66D3FA);
                background-size: 400% 400%;
                animation: backgroundGradient 10s ease infinite;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }

            @keyframes backgroundGradient {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }

            /* Container Styling */
            .container {
                background-color: rgba(255, 255, 255, 0.9);
                padding: 40px;
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                text-align: center;
                width: 350px;
            }

            /* Heading Style */
            h1 {
                font-size: 2rem;
                color: #333;
                margin-bottom: 20px;
            }

            /* Button Styles */
            button {
                padding: 12px 30px;
                font-size: 1.1rem;
                color: white;
                background-color: #28a745;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            button:hover {
                background-color: #218838;
            }
        </style>