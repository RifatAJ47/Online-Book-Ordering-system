<?php
require_once 'aes_helper.php';
require_once 'db.php'; 

$message = ''; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book_name = $_POST['book_name'];

    $encrypted_name = AESHelper::encrypt($book_name);
    $sql = "INSERT INTO books (name) VALUES ('$encrypted_name')";
    if (mysqli_query($conn, $sql)) {
        $message = "Book added successfully!"; 
    } else {
        $message = "Error: " . mysqli_error($conn); 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Book</title>

</head>
<body>
    <?php if ($message): ?>
   
        <div class="success-message">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <div class="container">

        <div class="form-container">
            <h1>Insert New Book</h1>
            <form method="POST">
                <label for="book_name">Book Name:</label><br>
                <input type="text" id="book_name" name="book_name" required><br><br>
                <button type="submit">Add Book</button>
            </form>

       
            <a href="login.php" class="back-button">Back to Login</a>
        </div>
    </div>
</body>
</html>
<style>
    
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
        flex-direction: column;
        text-align: center;
    }

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

  
    .success-message {
        background-color: #28a745;
        color: black; 
        font-size: 2em;
        font-weight: bold;
        padding: 20px;
        border-radius: 8px;
        width: 80%;
        max-width: 500px;
        margin-top: 30px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

   
    .container {
        width: 100%;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        padding: 10px;
    }

   
    .form-container {
        background-color: rgba(255, 255, 255, 0.85);
        padding: 30px;
        border-radius: 10px;
        width: 350px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

  
    .form-container h1 {
        font-size: 1.8em;
        color: #333;
        margin-bottom: 20px;
    }

    
    .form-container input {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border: 2px solid #ccc;
        border-radius: 5px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    .form-container input:focus {
        border-color: #28a745;
        outline: none;
    }

   
    .form-container button {
        padding: 12px 30px;
        font-size: 1.1rem;
        color: white;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-top: 20px;
    }

   
    .form-container button:hover {
        background-color: #0056b3;
    }

   
    .back-button {
        margin-top: 20px;
        padding: 12px 30px;
        background-color: #6c757d;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-size: 1.1rem;
        transition: background-color 0.3s ease;
        display: inline-block;
    }

 
    .back-button:hover {
        background-color: #5a6268;
    }
</style>