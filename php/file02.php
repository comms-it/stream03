<?php 
/**
 * FILE 02
 */

require  'vendor/autoload.php';

use Jsq\EncryptionStreams\Cbc;
use GuzzleHttp\Psr7\Stream;
use Jsq\EncryptionStreams\AesDecryptingStream;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$key = 'some-secret-password-here';



// leggere il file con la chiave

// prendere il file da decriptare

// istanziare il decriptatore

// usare la stessa password


$iv = file_get_contents(__DIR__.'/archive/encrypted.iv');

$iv = base64_decode($iv);

$cipherMethod = new Cbc($iv);

$cipherText = new Stream(fopen(__DIR__.'/archive/loremipsum-ENCRYPTED.txt', 'r')); // Any PSR-7 stream will be fine here

//$cipherTextStream = new AesEncryptingStream($inStream, $key, $cipherMethod); // Wrap the stream in an EncryptingStream
try {
    $cipherTextStream = new AesDecryptingStream($cipherText, $key, $cipherMethod);
    
    $cipherTextFile = GuzzleHttp\Psr7\stream_for(fopen(__DIR__.'/archive/loremipsum-2.txt', 'w'));
    
    GuzzleHttp\Psr7\copy_to_stream($cipherTextStream, $cipherTextFile);
    
} catch (\RuntimeException $e){
    echo "ERROR: -".$e->getMessage();
}


echo '<h1>Success!</h1>';
