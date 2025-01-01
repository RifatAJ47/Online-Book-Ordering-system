<?php
require_once 'db.php'; // Include the database connection

// Function to decrypt data
function decryptData($encrypted_data) {
    $key = '7d8e9f4a6c2b893e5d7f3a5e2c4b7d9f'; // Secret key
    $method = 'AES-256-CBC'; // Encryption method
    $iv = substr(hash('sha256', $key), 0, 16); // Initialization vector

    $data = base64_decode($encrypted_data); // Decode base64 data
    return openssl_decrypt($data, $method, $key, 0, $iv); // Decrypt data
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = encryptData($_POST['email']); // Encrypt email for search
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            echo "<script>alert('Login successful!'); window.location.href='dashboard.php';</script>";
        } else {
            echo "Invalid credentials.";
        }
    } else {
        echo "No user found with this email.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="POST">
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
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