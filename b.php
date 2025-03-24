<?php

// Generate a new private key
$privateKey = openssl_pkey_new(array(
    "private_key_bits" => 2048,
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
));

// Extract the private key from $privateKey to $privateKeyStr
// openssl_pkey_export($privateKey, $privateKeyStr);

// Generate a new public key
$publicKey = openssl_pkey_get_details($privateKey)["key"];

// Data to encrypt
$data = "secret message";

// Encrypt the data using the public key
openssl_public_encrypt($data, $encryptedData, $publicKey);

// Decrypt the data using the private key
openssl_private_decrypt($encryptedData, $decryptedData, $privateKeyStr);

// Output the original data and the decrypted data
echo "Original Data: " . $data . "\n";
echo "Decrypted Data: " . $decryptedData . "\n";

?>