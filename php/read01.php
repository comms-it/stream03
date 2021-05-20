<h3>Read 01</h3>
<?php 
//READ01

$stream = fopen(__DIR__.'/../archive/divinacommedia.txt', 'r');

if($stream===FALSE){
    die('Errore nell\'apertura del file');
}

// get some data
$show = stream_get_contents($stream, 35, 12);

echo '<pre>'.$show.'</pre>';
// Nel mezzo del cammin di nostra vita

fclose($stream);
