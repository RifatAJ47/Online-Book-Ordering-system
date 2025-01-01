
<?php
require_once 'aes_helper.php';

function validate_credentials($email, $password, $conn) {
    $encrypted_email = AESHelper::encrypt($email);
    $sql = "SELECT * FROM users WHERE email = '$encrypted_email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        return password_verify($password, $user['password']);
    }

    return false;
}
?>





