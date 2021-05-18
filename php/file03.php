<?php 
/**
 * FILE 03
 */

require  'vendor/autoload.php';

use Jsq\EncryptionStreams\Cbc;
use GuzzleHttp\Psr7\Stream;
use Jsq\EncryptionStreams\AesEncryptingStream;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$iv = random_bytes(openssl_cipher_iv_length('aes-256-cbc'));
$cipherMethod = new Cbc($iv);
$key = 'some-secret-password-here';

$cipherMethod = new Cbc($iv);

$key = 'some-secret-password-here';

$inStream = new Stream(fopen(__DIR__.'/archive/loremipsum.txt', 'r')); // Any PSR-7 stream will be fine here

$plaintext = $inStream;

$hash = null;
$ciphertext = new AesEncryptingStream(
        $plaintext = $inStream,
        $key,
        $cipherMethod
    );

$hashingDecorator = new Jsq\EncryptionStreams\HashingStream(
        $ciphertext,
        $key,
        function ($calculatedHash) use (&$hash) {
            $hash = $calculatedHash;
        }
    );
// var_dump($hash);
// var_dump($hashingDecorator);
// var_dump($hashingDecorator->getHash());

$fileHandler = fopen(__DIR__.'/archive/loremimpsum-crypted.txt', "w+");

while (!$ciphertext->eof()) {
    $buffer = $ciphertext->read(1024 * 1024);
    fwrite($fileHandler, $buffer);
}

fclose($fileHandler);

//assert($hash === $hashingDecorator->getHash());

echo '<h1>Success</h1>';
