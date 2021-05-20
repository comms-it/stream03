<?php
/**
 * APPEND FILTER UPPERCASE TO STREAM
 */

$input1 = file_get_contents('php://filter/read=string.toupper/resource=php://input', 'r');

echo $input1;


