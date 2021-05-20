<?php

echo "<h3>Il server ha ricevuto (php://input): </h3>";  
 
$dataJson = file_get_contents('php://input');

echo '<pre>'.$dataJson.'</pre>';

