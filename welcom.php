<?php 
include_once("connection.php");

if(isset($_GET['email'])){
    $userEmailWelcom = $_GET['email'];
}

if(isset($_POST['logout'])){
    header("Location: login.php");
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body style="text-align: center; background-color:darkgray;">

<h1 style=" margin-top:100px; color:darkorange;">Welcome <span style="color: black;"><?php echo $userEmailWelcom ?></span></h1>

<!-- REDIRECT THE USER TO THE MAIN PAGE AFTER CLICK LOGOUT BUTTON -->
<form action="login.php" method="POST">
    <input type="submit" name="logout" value="Logout">
</form>
    
</body>
</html>