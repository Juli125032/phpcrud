<?php

$server="localhost";
$db="phpcrud";
$username="root";
$password="";

try {
    $connection=new PDO("mysql:host=$server;dbname=$db", $username, $password);
} catch (Exception $e) {
    echo $e->getMessage();
}

?>