<?php
session_start();

// Check if payment details exist
if (isset($_SESSION['payment_details'])) {
    $payment_details = $_SESSION['payment_details'];
    $book = $payment_details['book'];
    $price = $payment_details['price'];

    // Clear the session details after displaying
    unset($_SESSION['payment_details']);
} else {
    header("Location: home.php"); // Redirect to home if accessed directly
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <style>
        /* Global Styling */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #28a745, #c0f4d8);
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Header Styling */
        h1 {
            font-size: 2.5em;
            color: #fff;
            font-weight: bold;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        /* Success Message */
        p {
            font-size: 1.2em;
            color: #f8f9fa;
            text-align: center;
            font-weight: 600;
            margin-bottom: 30px;
        }

        /* Book and Price Details */
        .details {
            font-size: 1.5em;
            color: #fff;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .details strong {
            color: #007bff;
        }

        /* Button Back to Home */
        a {
            padding: 12px 25px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-size: 1.2em;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <h1>Thank You for Your Purchase!</h1>
    <p>You have successfully purchased <strong><?php echo htmlspecialchars($book); ?></strong> for <strong>$<?php echo htmlspecialchars($price); ?></strong>.</p>
    <div class="details">
        <p>We hope you enjoy your book!</p>
    </div>
    <a href="home.php">Back to Home</a>
</body>
</html>
