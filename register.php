<?php
require_once 'db.php'; // Include the database connection

// Function to encrypt data
function encryptData($data) {
    $key = '7d8e9f4a6c2b893e5d7f3a5e2c4b7d9f'; // Secret key
    $method = 'AES-256-CBC'; // Encryption method
    $iv = substr(hash('sha256', $key), 0, 16); // Initialization vector

    $encrypted_data = openssl_encrypt($data, $method, $key, 0, $iv); // Encrypt data
    return base64_encode($encrypted_data); // Encode encrypted data
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = encryptData($_POST['name']); // Encrypt name
    $email = encryptData($_POST['email']); // Encrypt email
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password

    // Insert data into database
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Registration successful!'); window.location.href='login.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="register.php" method="POST">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>
</body>
</html>




<style>
        /* Global Styling */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(45deg, #ff6f61, #ffbc00, #28a745, #007bff);
            background-size: 400% 400%;
            animation: gradientAnimation 10s ease infinite;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Gradient Animation */
        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        /* Container Styles */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Login Form */
        .login-form {
            background-color: rgba(255, 255, 255, 0.85);
            padding: 30px;
            border-radius: 10px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Header Style */
        .login-form h1 {
            font-size: 1.8em;
            color: #333;
            margin-bottom: 20px;
        }

        /* Input Fields */
        .login-form input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .login-form input:focus {
            border-color: #28a745;
            outline: none;
        }

        /* Button Styles */
        .login-form button {
            padding: 12px 30px;
            font-size: 1.1rem;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-form button:hover {
            background-color: #0056b3;
        }

        /* Register and Links Styling */
        .register-link, .other-links a {
            margin-top: 15px;
            display: inline-block;
            color: #007bff;
            font-size: 1rem;
            text-decoration: none;
        }

        .register-link:hover, .other-links a:hover {
            text-decoration: underline;
        }

        .other-links {
            margin-top: 20px;
        }

        /* Styling for the buttons "Insert New Book" and "View New Books" */
        .other-links a {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            font-weight: 600;
            text-decoration: none;
            margin: 5px 0;
            display: inline-block;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        /* Hover effect for buttons */
        .other-links a:hover {
            background-color: #218838;
            transform: translateY(-3px);
        }

        /* Focus effect for active link */
        .other-links a:focus {
            outline: 3px solid #007bff;
        }
    </style>
       <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .register-form {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }
        .register-form h1 {
            margin-bottom: 20px;
        }
        .register-form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .register-form button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .register-form button:hover {
            background-color: #0056b3;
        }
        .back-to-login {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        .back-to-login:hover {
            color: #0056b3;
        }
    </style>