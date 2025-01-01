<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $book = htmlspecialchars($_POST['book']);
    $price = $_POST['price'];
    $bkash_number = htmlspecialchars($_POST['bkash_number']);

    if (isset($_POST['otp_input'])) {
        $input_otp = $_POST['otp_input'];
        $demo_otp = 1234; 

        if ($input_otp == $demo_otp) {
   
            $_SESSION['payment_details'] = [
                'book' => $book,
                'price' => $price
            ];
            header("Location: payment-success.php");
            exit();
        } else {
   
            echo "<p>Invalid OTP. Please try again.</p>";
        }
    } else {
    
        echo "<h3>OTP has been sent to your mobile number: $bkash_number</h3>";
        echo "<p>Please enter the OTP to confirm your payment.</p>";

        echo "<form action='checkout.php' method='POST'>
                <input type='hidden' name='book' value='$book'>
                <input type='hidden' name='price' value='$price'>
                <input type='hidden' name='bkash_number' value='$bkash_number'>
                <label for='otp_input'>Enter OTP:</label>
                <input type='text' name='otp_input' required pattern='[0-9]{4}' title='Please enter a valid 4-digit OTP'>
                <button type='submit'>Confirm Payment</button>
              </form>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Confirm Payment</title>
    <style>
        /* Global Styling */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #6e7dff, #c0c6ff);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            min-height: 100vh;
            color: #333;
        }

        /* Header Styling */
        h1 {
            font-size: 2em;
            font-weight: bold;
            margin-top: 20px;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        h3 {
            font-size: 1.5em;
            color: #f0f0f0;
            font-weight: 600;
            margin-bottom: 15px;
        }

        /* Form Styling */
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
            margin-top: 20px;
        }

        /* Input Fields and Labels */
        label {
            font-size: 1em;
            color: #333;
            margin-bottom: 5px;
            display: block;
            font-weight: bold;
        }

        input, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 1em;
        }

        input[type="text"]:focus {
            border-color: #007bff;
            outline: none;
        }

        /* Buttons */
        button {
            padding: 12px 25px;
            background-color: #007bff;
            color: white;
            font-size: 1.2em;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Back to Home Link */
        a {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-size: 1.2em;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #218838;
        }

    </style>
</head>
<body>
   

    <a href="home.php">Back to Home</a>
</body>
</html>
