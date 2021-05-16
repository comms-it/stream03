<?php
/**
 * APPEND FILTER TO STREAM
 */

//$input = file_get_contents('php://filter/read=string.toupper/resource=php://input', 'r');
$input = file_get_contents('php://filter/read=string.toupper|string.rot13/resource=php://input', 'r');

echo $input;


