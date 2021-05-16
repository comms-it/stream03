<?php 

//stream_filter_append()
$handle = fopen(__DIR__.'/../archive/file.txt', 'rb');

stream_filter_append($handle, 'string.toupper');
//stream_filter_append($handle, 'string.rot13');

while(feof($handle) !== true) {
    
    echo fgets($handle);
    
}

fclose($handle);


