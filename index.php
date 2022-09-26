<!-- include the connection file with database -->
<?php
include_once("connection.php");

if (isset($_POST['login'])) {
    header("Location: http://localhost/crud-form-validation/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: cursive;
        background-color: darkgrey;
    }

    #btn1 {
        width: 400px;
        height: 50px;
        border-radius: 20px;
        cursor: pointer;
        background-color: red;
        margin-bottom: 20px;
        font-weight: 900
    }

    #btn2 {
        width: 400px;
        height: 50px;
        border-radius: 20px;
        cursor: pointer;
        background-color: skyblue;
        font-weight: 900
    }

    #container {
        text-align: center
    }
</style>

<body>

    <div id="container">
        <h1>Welcome to our page</h1>
        <p>Have fun and support your work with high level</p>
        <img width="400px" height="300px" src="https://img.freepik.com/free-vector/stressed-millennial-guy-studying-before-college-exams-distressed-student-meeting-deadline-doing-assignment-preparing-test-home-with-books-flat-illustration_74855-20731.jpg?w=2000" alt="">
        <form action="login.php" method="POST">
            <button id="btn1" name="FromIndexLogin" type="submit">Login</button><br>
        </form>
        <form action="signup.php" method="POST">
            <button id="btn2" name="siginup" type="submit">Sigin up</button>
        </form>
    </div>
</body>

</html>