<?php

$dsn = "mysql:host=localhost; dbname=users";
$user = "root";
$password = "root";

try{
$connection = new PDO($dsn, $user, $password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// echo "connection done successfully !!";
}
catch(PDOException $error){
    echo "failed to connect with database users" . $error->getMessage();
}

?>