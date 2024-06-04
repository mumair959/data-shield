<?php

namespace Devtec\DataShield;

class DataShield
{
    // Store the cipher method
    private static $ciphering = "AES-128-CTR";

    private static $options = 0;
        
    // Non-NULL Initialization Vector for encryption/decryption
    private static $secret_iv = '1234567891011121';
    
    // Store the secret key
    private static $secret_key = "MyFirstLibrary";

    public static function encryption(String $string)
    {   
        // Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length(self::$ciphering);
        
        // Use openssl_encrypt() function to encrypt the data
        $encryption = openssl_encrypt($string, self::$ciphering, self::$secret_key, self::$options, self::$secret_iv);

        return $encryption;
    }

    public static function decryption(String $string)
    {        
        // Use openssl_decrypt() function to decrypt the data
        $decryption = openssl_decrypt($string, self::$ciphering, self::$secret_key, self::$options, self::$secret_iv);

        return $decryption;
    }
}