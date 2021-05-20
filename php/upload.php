<?php
// read contents from the input stream
$inputHandler = fopen('php://input', "r");
// create a temp file where to save data from the input stream
$fileHandler = fopen(__DIR__.'/../uploaded/myfile.tmp', "w+");

if(!$fileHandler){
 throw new \Exception('File handler KO');
}

// save data from the input stream
while(true) {
    
    $buffer = fgets( $inputHandler, 4096 );
	
	if (strlen($buffer) == 0) {
		fclose($inputHandler);
		fclose($fileHandler);
		return true;
	}
	
	fwrite($fileHandler, $buffer);
}

// done
