<html>
<head>
</head>
<body>
<p>
</p>
<?php
define("FILENAME", "ids.txt");
$file = 0;

if(!file_exists(FILENAME))
{
    fclose(fopen(FILENAME, "w"));
}
$file = fopen(FILENAME, "r");

if(isset($_GET["key"])) {
    $id = $_GET["key"];
    echo exec("python3 pingUser.py " . $id);
    echo "<br>";
}

echo "Click on something to bug that person's phone. <br><br>";
while(!feof($file)) {
    $s = fgets($file);
    echo "<a href=\"index.php?key=". $s ."\" class=\"id\">";
    echo $s;
    echo "</p>";
}
?>
</body>
</html>
