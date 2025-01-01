<?php
require_once 'aes_helper.php';
require_once 'db.php'; 

$email = AESHelper::encrypt($_POST['email']);
$name = AESHelper::encrypt($_POST['name']);
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
if (mysqli_query($conn, $sql)) {
    echo "Registration successful!";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
