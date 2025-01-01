<?php
require_once 'aes_helper.php';
require_once 'db.php'; // Database connection

$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books List</title>
    <style>
        /* Global Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color:rgb(69, 141, 236);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
            text-align: center;
        }

        /* Header Style */
        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        /* Table Styles */
        table {
            width: 60%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #28a745;
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

        /* Hover Effect for Table Rows */
        tr:hover {
            background-color: #f1f1f1;
        }

        /* Button Styles */
        button {
            padding: 12px 30px;
            background-color: #007bff;
            color: white;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <h1>Books List</h1>
        <table>
            <tr>
                <th>Book Name</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <?php 
                
                    $decrypted_name = AESHelper::decrypt($row['name']);
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($decrypted_name); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No books found.</p>
    <?php endif; ?>

    <button onclick="window.location.href='login.php'">Back to Login</button>

</body>
</html>
