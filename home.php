<?php
session_start();
require_once 'aes_helper.php';
require_once 'db.php'; 

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

echo "<h1>Welcome, " . htmlspecialchars($_SESSION['email']) . "!</h1>";

$default_books = [
    ["name" => "The Catcher in the Rye", "price" => 15],
    ["name" => "To Kill a Mockingbird", "price" => 20],
    ["name" => "1984", "price" => 18],
    ["name" => "The Great Gatsby", "price" => 25],
    ["name" => "Moby Dick", "price" => 22],
    ["name" => "War and Peace", "price" => 30],
    ["name" => "Pride and Prejudice", "price" => 18],
    ["name" => "The Hobbit", "price" => 10],
    ["name" => "Ulysses", "price" => 35],
    ["name" => "Hamlet", "price" => 12]
];


$additional_books = [];
$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
   
        $book_name = AESHelper::decrypt($row['name']);
        $book_price = AESHelper::decrypt($row['price']);
        $additional_books[] = ["name" => $book_name, "price" => $book_price];
    }
}

$all_books = array_merge($default_books, $additional_books);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Books</title>
   
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['email']); ?>!</h1>
    <h2>Available Books</h2>
    <ul>
        <?php
        foreach ($all_books as $book) {
            echo "<li>
                    <span>" . htmlspecialchars($book['name']) . " - $" . htmlspecialchars($book['price']) . "</span>
                    <a href='buy.php?book=" . urlencode($book['name']) . "&price=" . urlencode($book['price']) . "'>Buy</a>
                  </li>";
        }
        ?>
    </ul>
    <a href="logout.php" class="logout">Logout</a>
</body>
</html>

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
            color: black;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        h2 {
            font-size: 1.5em;
            color:rgb(0, 0, 0);
            font-weight: 600;
            margin-bottom: 20px;
        }

        /* Book List Styling */
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            width: 80%;
            max-width: 600px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        /* Book List Items Styling */
        li {
            background-color: #ffffff;
            padding: 15px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #333;
        }

        li:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            background-color: #f9f9f9;
        }

        /* Book Title and Price Styling */
        li span {
            font-size: 1.1em;
            font-weight: bold;
            color: #555;
        }

        /* Buy Link Styling */
        a {
            font-size: 1em;
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #0056b3;
        }

        /* Logout Link Styling */
        .logout {
            margin-top: 30px;
            padding: 12px 30px;
            font-size: 1.2em;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            transition: background-color 0.3s ease;
        }

        .logout:hover {
            background-color: #218838;
        }
    </style>