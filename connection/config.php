<?php

$servername = "localhost";
$user = "root"; //server: codeviab_thesis
$pass = ""; //server: Thesis1234
$dbname = "myras"; //server: codeviab_thesis
$port = 8889;


$db = mysqli_connect($servername,$user,$pass,$dbname);

if (!$db) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

?>
