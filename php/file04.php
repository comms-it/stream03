<?php 

require  'vendor/autoload.php';

use Jsq\EncryptionStreams\Cbc;
use GuzzleHttp\Psr7\Stream;
use Jsq\EncryptionStreams\AesEncryptingStream;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$key = 'secret key';
$iv = random_bytes(openssl_cipher_iv_length('aes-256-cbc'));

$plainText = 'Super secret text';

$cipherText = openssl_encrypt(
        $plainText,
        'aes-256-cbc',
        $key,
        OPENSSL_RAW_DATA,
        $iv
        );

$expectedHash = hash('sha256', $cipherText);

$hashingDecorator = new Jsq\EncryptionStreams\HashingStream(
        GuzzleHttp\Psr7\stream_for($cipherText),
        $key,
        function ($hash) use ($expectedHash) {
            if ($hash !== $expectedHash) {
                throw new DomainException('Cipher text mac does not match expected value!');
            }
        }
        );
$cipherMethod = new Cbc($iv);

$decrypted = new Jsq\EncryptionStreams\AesEncryptingStream(
        GuzzleHttp\Psr7\stream_for($cipherText),
        $key,
        $cipherMethod
        );
$fileHandler = fopen(__DIR__.'/archive/loremimpsum-crypthedv2.txt', "w+");

while (!$decrypted->eof()) {
    $buffer = $decrypted->read(1024 * 1024);
    fwrite($fileHandler, $buffer);
}

fclose($fileHandler);

