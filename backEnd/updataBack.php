<?php

include_once("connection.php");

//getting the row data to put them as placeholders before updating 
if (isset($_POST['adminUpdate'])) {

    $id = $_POST['thisID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number= $_POST['number'];
    $pass = $_POST['pass'];
    $datecreate = $_POST['datecreated'];
    $lastlogin = $_POST['lastlogin'];
    
}

if(isset($_POST['update'])){
    $userID = $_POST['userID'];
    $newEmail = $_POST['newemail'];
    $newNumber = $_POST['newnum'];
    $newName = $_POST['name'];
    $newPassword = $_POST['newpass'];
    $newDateCreated = $_POST['newdatecreated'];
    $newLastLogin = $_POST['newDatelogin'];

    $query = "UPDATE `users data` SET email=?, number=?, fullName=?, password=?, DateCreated=?, lastLogin=? WHERE id=$userID";
     $statement = $connection->prepare($query);
     $statement->execute([$newEmail, $newNumber, $newName, $newPassword, $newDateCreated, $newLastLogin]);

     header("Location: admin.php");

}




?>