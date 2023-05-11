<?php
$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '1234567891011121';
$encryption_key = "Msdentals";
$decryption_iv = '1234567891011121';
$decryption_key = "Msdentals";
// $decryption=openssl_decrypt ($encryption, $ciphering, 
//         $decryption_key, $options, $decryption_iv);

  
?>