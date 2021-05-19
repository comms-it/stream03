<?php 


include 'DirtyWordsFilter.php';


stream_filter_register("dirtywordsfilter", "DirtyWordsFilter")
or die("Failed to register filter");

?>
<h1>custom filter</h1>

<?php 

$handle = fopen(__DIR__.'/../archive/file.txt', 'rb');

stream_filter_append($handle, 'dirtywordsfilter');
stream_filter_append($handle, 'string.rot13');

while(feof($handle) !== true) {
    
    echo fgets($handle);
    
}

fclose($handle);