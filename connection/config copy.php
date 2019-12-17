<?php

$servername = "localhost";
$user = "u935469128_thutm"; //server: codeviab_thesis
$pass = "thutm17@CSI"; //server: Thesis1234
$dbname = "u935469128_thutm"; //server: codeviab_thesis

$db = mysqli_connect($servername,$user,$pass,$dbname);

if (!$db) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

?>
