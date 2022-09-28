<?php include_once("../backEnd/updataBack.php") ?>
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