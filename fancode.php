<?php
function fetchAndModifyM3U($url, $outputFile) {
    
    $content = file_get_contents($url);

    
    if ($content === FALSE) {
        echo "Error: Unable to fetch content from the URL.";
        return;
    }

    
    $pattern = '/group-title="[^"]*"/';
    $replacement = 'group-title="FANCODE LIVE"';
    $modifiedContent = preg_replace($pattern, $replacement, $content);

    if ($modifiedContent === NULL) {
        echo "Error: Unable to modify the content.";
        return;
    }

   
    $result = file_put_contents($outputFile, $modifiedContent);


    if ($result === FALSE) {
        echo "Error: Unable to write content to the file.";
        return;
    }

    echo "Success: The file has been updated and saved as $outputFile.";
}


$url = "https://raw.githubusercontent.com/byte-capsule/FanCode-Hls-Fetcher/main/Fancode_Live.m3u";
$outputFile = "fancode.m3u";


fetchAndModifyM3U($url, $outputFile);
?>
