<html>
<head>
</head>
<body>
<p>Click on something to bug that person's phone. 
<br><br>
</p>
<form action="/index.php" method="post">
<input type="text" name="message">
<select name="key">
<?php
define("FILENAME", "ids.txt");
$file = 0;

if(!file_exists(FILENAME)) {
    fclose(fopen(FILENAME, "w"));
}

$file = fopen(FILENAME, "r");

if(isset($_POST["key"])) {
    $id = trim($_POST["key"]);
    $message = trim($_POST["message"]);
    $s = "python3 pingUser.py \"" . $id . "\" \"" . $message . "\"";
    echo $s;
    echo exec($s);
    echo "<br>";
}

while(!feof($file)) {
    $s = fgets($file);
    if(strcmp("", $s) != 0) {
        echo "<option value=\"";
        echo $s;
        echo "\">";
        echo $s;
        echo "</option>";
    }
}
?>
</select>
<br>
<input type="submit">
</form>
</body>
</html>
