<?php
/**
 * APPEND FILTER TO STREAM
 */

$input1 = file_get_contents('php://filter/read=string.toupper/resource=php://input', 'r');
//$input2 = file_get_contents('php://filter/read=string.toupper|string.rot13/resource=php://input', 'r');

echo $input1;
// echo ' <br> ';
// echo $input2;


