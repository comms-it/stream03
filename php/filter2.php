<?php
/**
 * APPEND FILTER UPPERCASE + ROT13 - TO STREAM
 */

$input2 = file_get_contents('php://filter/read=string.toupper|string.rot13/resource=php://input', 'r');

echo $input2;


