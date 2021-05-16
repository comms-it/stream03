<?php
 
$dataJson = file_get_contents('php://input');

echo "<h3>Il server ha ricevuto (php://input): </h3>";  

echo '<pre>'.$dataJson.'</pre>';

