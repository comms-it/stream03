<?php
echo '<h3>Download rate</h3>';

// Download Rate

$local_file = dirname(__FILE__).'/largefiles/100MB.zip';
$download_file = 'myCustomName.zip';

// set the download rate limit (=> 50 kBytes/s = 400 kbps)
$download_rate = 50 * 1024;

if(file_exists($local_file) && is_file($local_file))
{
    header('Cache-control: private');
    header('Content-Type: application/octet-stream');
    header('Content-Length: '.filesize($local_file));
    header('Content-Disposition: filename='.$download_file);

    flush();
    $file = fopen($local_file, "r");
    while(!feof($file))
    {
        // send the current file part to the browser
        print fread($file, round( $download_rate ));
        // flush the content to the browser
        flush();
        // sleep one second
        sleep(1);
    }
    fclose($file);}
else {
    die('Error: The file '.$local_file.' does not exist!');
}
