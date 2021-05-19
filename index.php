<?php
/**
 * STREAM 03 - AJAX POST & PHP STREAM
 */
?>
<!DOCTYPE html>
<html>

    <body>
    
        <h2>STREAM in PHP </h2>
        <h4>GrUSP Torino 20 Maggio 2021</h4>
        <div style="display: flex">
        
            <div style="flex:1">
        	
                <h3>01. BODY POST</h3>
                <ol>
                	 <li>
                		  <a href="/html/xhr-urlencoded.html">XHR URL ENCODED</a>
                		  <br>
                		  <small>Carica i dati del form attraverso XMLHttpRequest (in url encoded)</small>
                	 </li>
                	 <li>
                		  <a href="/html/xhr-json.html">XHR JSON</a>
                		  <br>
                		  <small>Carica i dati del form attraverso XMLHttpRequest (in formato json)</small>
                	 </li>
                
                	 <li>
                		  <a href="/html/fetch.html">FETCH</a>
                		  <br>
                		  <small>Carica i dati del form attraverso un fetch</small>
                	 </li>
                </ol>
        	</div>
            <div style="flex:1">
        	
                <h3>02. STREAM FILTER</h3>
                
                <p><a href="/archive/file.txt">Divina Commedia</a></p>
                
                <ol>
                	 <li>
                		  <a href="/html/fetchToFilter.html">FETCH TO FILTER</a>
                		  <br>
                		  <small>Filtra i dati postati via fetch</small>
                	 </li>
                	 <li>
                		  <a href="/php/filter.php">STREAM FILTER</a>
                		  <br>
                		  <small>file filter with stream_filter_append</small>
                	 </li>
                	 <li>
                		  <a href="/php/customFilter.php">CUSTOM FILTER</a>
                		  <br>
                		  <small>stream_filter_append</small>
                	 </li>
                </ol>
        	</div>
        </div>
        
        <div style="display: flex">
        
            <div style="flex:1">
            
                <h3>03. DOWNLOAD - UPLOAD</h3>
                
                <ol>
                	<li>
                		<a href="/php/download.php">Stream download</a>
                		<br>
                		<small>Cliccando qui partir&agrave; il download di un file di 100MB in circa 30 minuti (limitato a 50 kB/s).</small>
                	</li>
                	<li>
                		<a href="/html/upload.html">Stream upload</a>
                		<br>
                		<small>Effettua l'upload di un file usando php stream + ajax (anche file di grandi dimensioni).</small>
                	</li>
                	<li>
                		<a href="/html/formupload.html">Form upload</a>	
                		<br>
                		<small>Effettua l'upload di un file con un form in php (dimensioni del file limitate al settaggio php "upload_max_filesize" = 20M)</small>
                	</li>
                </ol>
                
            </div>
            
            <div style="flex:1">
            
            	<?php 
                /**
                 * PSR7 STREAM ENCRYPTION
                 * @link https://packagist.org/packages/jsq/psr7-stream-encryption
                 */
                ?>
                <h3>04. PSR7 STREAM ENCRIPTION </h3>
                <p>Advanced Encryption Standard (AES)</p>
                <ol>
                    <li>file 01 <a href="/php/file01.php">LINK</a> (con AES criptazione)
                    <li>file 02 <a href="/php/file02.php">LINK</a> (con AES decriptazione)
                    <li>file 03 <a href="/php/file03.php">LINK</a> (con AES criptazione ed hashing)
                    <li>file 04 <a href="/php/file04.php">LINK</a> (con AES decriptazione ed hashing)
                </ol>
                
            </div>
            
        </div>
        
         <div style="display: flex">
        
            <div style="flex:1">
            
            <h3>05. reading in the middle</h3>
            <ol>
                <li>read content from offset<a href="/php/read01.php">LINK</a>
                <li>read line by line<a href="/php/read02.php">LINK</a>
                <li>read bytes range<a href="/php/read03.php">LINK</a>
            </ol>
    </body>
</html>
