<?php 
/**
 * READ02
 */
?>
<h3>Read 02</h3>

<?php

$stream = fopen(__DIR__.'/../archive/divinacommedia.txt', 'r');

if($stream===FALSE){
    die('Errore nell\'apertura del file');
}

// get some data
$i=0;
echo '<pre>';

while ( ($buffer = fgets($stream, 1024)) !== false ) {
    
    echo $i.$buffer;
    
    if($i++==10)break;
}
echo '</pre>';

if (!feof($stream)) {
    echo "<p>Error: unexpected fgets() fail\n</p>";
}

//echo '<pre>'.$show.'</pre>';
echo '<p>Ending;</p>';
// move back to the beginning of the file
// same as rewind($fp); 
fseek($stream, 0);

fclose($stream);

?>