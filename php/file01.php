<?php 
/**
 * FILE 01
 */

require  '../vendor/autoload.php';

use Jsq\EncryptionStreams\Cbc;
use GuzzleHttp\Psr7\Stream;
use Jsq\EncryptionStreams\AesEncryptingStream;
use GuzzleHttp\Psr7\Utils;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "Stream 04 - Demo 01";
echo "<h3>Chiave simmetrica e block-chain</h3>";

$method="aes-256-cbc";
echo "Method (openssl cipher method): $method <br>";

$length     = openssl_cipher_iv_length($method);
$lengthBits = $length*8;
echo "Length (openssl cipher iv length): $length (*8 = $lengthBits Bits) <br>";

// Initialization vector
$iv = random_bytes($length);
echo "Initialization Vector (IV): $iv <br>";

echo "<hr>";

// Cipher Block Chaining # https://it.wikipedia.org/wiki/Modalit%C3%A0_di_funzionamento_dei_cifrari_a_blocchi#Cipher_Block_Chaining_(CBC)
$cipherMethod = new Cbc($iv);
echo "OpenSslName: ".$cipherMethod->getOpenSslName()." <br>";
echo "CurrentIV: ".$cipherMethod->getCurrentIv()." <br>";


$key = 'some-secret-password-here';
echo "key: $key <br>";

$path=__DIR__.'/../archive/';
$filename01="divinacommedia.txt";
$filename02="divinacommedia-ENCRYPTED.txt";

// Any PSR-7 stream will be fine here
$inStream = new Stream(fopen($path.$filename01, 'r')); 

// Wrap the stream in an EncryptingStream
$cipherTextStream = new AesEncryptingStream($inStream, $key, $cipherMethod);

echo 'InStream File: '.$filename01.'<br>';
echo 'File Size: '.filesize($path.$filename01).'<br>';
echo 'cipherTextStream Size: '.($cipherTextStream->getSize()).'<br>';
echo '<hr>';
//echo '<pre>';print_r($cipherTextStream);die('AES ENCRYP STREAM');echo '</pre>';


// Destination Stream, writing in a new file
$cipherTextFile = Utils::streamFor(fopen($path.$filename02, 'w'));
echo 'Ciphered File: '.$filename02.'<br>';

// When you read from the encrypting stream, the data will be encrypted
Utils::copyToStream($cipherTextStream, $cipherTextFile);
echo 'Ciphered File Successfully Writed <br>';

//echo '<pre>';print_r($cipherTextFile);die('AES ENCRYP STREAM');echo '</pre>';
echo 'Ciphered File Size: '.($cipherTextFile->getSize()).'<br>';
echo '<hr>';

/* You'll also need to store the IV somewhere, because we'll need it later to decrypt the data.
In this case, I'll base64 encode it and stick it in a file 
(but we could put it anywhere where we can retrieve it later, like a database column)
*/
file_put_contents(__DIR__.'/../archive/encrypted.iv', base64_encode($iv));

echo 'Encrypted IV Encoded and Successfully Writed<br>';
echo '<hr>';

?>
<table>
  <tr>
    <th width="50%">File Originale (<?= $filename01 ?>)</th>
    <th width="50%">File Criptato (<?= $filename02 ?>)</th>
  </tr>
  <tr>
    <td style="vertical-align: top;"><?php print file_get_contents($path.$filename01)?></td>
    <td style="vertical-align: top;"><?php print file_get_contents($path.$filename02)?></td>
  </tr>
</table>


