<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['book']) && isset($_GET['price'])) {
    $book = htmlspecialchars($_GET['book']);
    $price = $_GET['price'];
} else {
    echo "No book selected.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Book</title>
   
</head>
<body>
    <h1>Confirm Your Purchase</h1>
    <p style="font-size: 1.2em; color: #f0f0f0;">You are purchasing: <strong><?php echo $book; ?></strong></p>
    <p style="font-size: 1.2em; color: #f0f0f0;">Price: <strong>$<?php echo $price; ?></strong></p>

    <h3>Payment Options:</h3>
    <p style="font-size: 1.1em; color: #f0f0f0;">Choose your payment method:</p>

    <form action="checkout.php" method="POST">
        <input type="hidden" name="book" value="<?php echo $book; ?>">
        <input type="hidden" name="price" value="<?php echo $price; ?>">
        
  
        <label for="bkash_number">Enter Bkash Mobile Number:</label>
        <input type="text" id="bkash_number" name="bkash_number" required placeholder="Enter your Bkash mobile number" pattern="^\+8801[3-9][0-9]{8}$" title="Enter a valid Bkash number starting with +8801 (e.g., +8801712345678)">

        <br><br>
        <label for="payment_method">Select Payment Method:</label>
        <select name="payment_method" id="payment_method">
            <option value="bkash">Bkash</option>
            <option value="other">Other Payment Methods</option>
        </select>

        <button type="submit">Proceed to Payment</button>
    </form>

    <a href="home.php">Back to Home</a>
</body>
</html>

<style>
 
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

 /* Section Titles */
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

 input, select {
     width: 100%;
     padding: 10px;
     margin-bottom: 15px;
     border-radius: 8px;
     border: 1px solid #ddd;
     font-size: 1em;
 }

 input[type="text"]:focus, select:focus {
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