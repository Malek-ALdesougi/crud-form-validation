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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update page</title>
</head>

<body style="display: flex; justify-content:center; background-color:darkgray;">

    <form style="text-align:center;" action="#" method="POST">
        <fieldset style="width:300px; height:350px;">
        
            <legend style="color:darkorange">Update Information</legend>
            <input name="userID" type="hidden" type="text" value="<?php echo $id ?>">

            <label for="firstname">Name</label>
            <input name="name" value="<?php echo $name ?>" style="margin-bottom:20px;margin-top:20px;margin-left:50px;" type="text" ><br>

            <label for="age">email</label>
            <input name="newemail" value="<?php echo $email ?>" style="margin-left:55px; margin-bottom:20px;" type="text"><br>

            <label for="age">number</label>
            <input name="newnum" value="<?php echo $number ?>" style="margin-left:40px; margin-bottom:20px;" type="number"><br>

            <label for="location">password</label>
            <input name="newpass" value="<?php echo $pass ?>" style="margin-bottom:20px;margin-left:30px;" type="text"><br>

            <label for="location">date created</label>
            <input name="newdatecreated" value="<?php echo $datecreate ?>" style="margin-bottom:20px;margin-left:15px;" type="text"><br>

            <label for="location">last login</label>
            <input name="newDatelogin" value="<?php echo $lastlogin ?>" style="margin-bottom:20px;margin-left:33px;" type="text"><br>


            <input type="submit" value="Update" name="update" style=" background-color:green; margin-left:90px; cursor:pointer; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; border-radius:5px;">
        </fieldset>
    </form>

</body>

</html>