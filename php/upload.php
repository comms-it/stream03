<?php
// read contents from the input stream
$inputHandler = fopen('php://input', "r");
// create a temp file where to save data from the input stream
$fileHandler = fopen(__DIR__.'/../uploaded/myfile.tmp', "w+");

if(!$fileHandler){
 throw new \Exception('File handler KO');
}

$uploadRate = 1 * 1000; // Bytes

// save data from the input stream
while(true) {
	$buffer = fgets( $inputHandler, $uploadRate );
	if (strlen($buffer) == 0) {
		fclose($inputHandler);
		fclose($fileHandler);
		return true;
	}
//	sleep(1);
	fwrite($fileHandler, $buffer);
}

// done
