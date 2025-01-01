<?php
if (file_exists('db.php')) {
    require_once('db.php');
} else {
    die('The db.php file was not found!');
}

// Fetch encrypted user data
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

// Decrypt user data
$decrypted_users = [];
while ($row = mysqli_fetch_assoc($result)) {
    $decrypted_user = [
        'id' => $row['id'],
        'email' => decryptData($row['email']),
        'password' => decryptData($row['password'])
    ];
    $decrypted_users[] = $decrypted_user;
}

// Decrypt function
function decryptData($data) {
    $key = '7d8e9f4a6c2b893e5d7f3a5e2c4b7d9f'; 
    $method = 'AES-256-CBC'; 
    $iv = substr(hash('sha256', $key), 0, 16);

    $decrypted_data = openssl_decrypt(base64_decode($data), $method, $key, 0, $iv);

    return $decrypted_data;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <style>
        /* আপনার পূর্বের CSS কোড এখানে থাকবে */
    </style>
</head>
<body>
    <div>
        <h2>User Information</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($decrypted_users as $user): ?>
                    <tr>
                        <td><?= $user['id']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td><?= $user['password']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
