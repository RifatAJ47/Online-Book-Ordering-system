
<?php
class AESHelper {
    private static $key = '7d8e9f4a6c2b893e5d7f3a5e2c4b7d9f'; 
    private static $cipher = 'AES-256-CBC';
    private static $iv = '1234567890123456'; 

    public static function encrypt($data) {
        return base64_encode(openssl_encrypt($data, self::$cipher, self::$key, 0, self::$iv));
    }

    public static function decrypt($data) {
        return openssl_decrypt(base64_decode($data), self::$cipher, self::$key, 0, self::$iv);
    }
}
?>
