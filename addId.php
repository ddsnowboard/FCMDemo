<?php
if(!isset($_GET["id"]))
{
    echo '{"error": "You done messed up, A-A-ron"}';
}
else {
    define("FILENAME", "ids.txt");
    $file = fopen(FILENAME, "r");
    if($file === false)
    {
        fclose(fopen(FILENAME, "w"));
        $file = $fopen(FILENAME, "r");
    }
    $id = $_GET["id"];
    if(filesize(FILENAME) == 0 || strpos(fread($file, filesize(FILENAME)), $id) === false){
        fclose($file);
        $wFile = fopen(FILENAME, "a");
        fwrite($wFile, $id);
        fwrite($wFile, "\n");
        echo '{"success": "Added "' . $id . '""}';
    }
    else {
        echo '{"success": ""' . $id . '" already existed"}';
    }
}
?>
