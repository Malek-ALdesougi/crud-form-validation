<?php
include_once("connection.php");

try {
    if (isset($_POST['login'])) {

        $loginEmail = $_POST['email'];
        $loginpass = $_POST['pass'];
        $loginDate = date("Y/M/D");
        // here need to declare a variable to date login and insert this variable after submit login to the database in its field;

        // GO TO ADMIN PAGE IF THE EMAIL AND PASSWORD CORRECT 
        if($loginEmail == 'Admin@admin.com' && $loginpass == 'Admin'){
            header("Location: admin.php");
            exit();
        }

        // check if the email exist or not in the database 

        $stmt = $connection->prepare("SELECT email FROM `users data` WHERE email=?");
        $stmt->execute([$loginEmail]);
        $user = $stmt->fetch();
        if ($user) { // if the email is exist then we will find if the password is for the same email or not 

            $sql = $connection->prepare("SELECT email FROM `users data` WHERE password=?");
            $sql->execute([$loginpass]);
            $check = $sql->fetch();

            if ($check) {
                //UPDATE THE DATE LOGIN IF THE EMAIL AND PASSWORD ARE DONE ;
                $sql = "UPDATE `users data` SET lastLogin=? WHERE email=?";
                $statement = $connection->prepare($sql);
                $statement->execute([$loginDate, $loginEmail]);
                // REDIRECT THE USER TO THE WELCOME PAGE ;
                header("Location: welcom.php?email=$loginEmail");
            } else {
                echo "<script> alert('Email or password is not correct please try again!!')</script> ";
            }
        } else {
            echo "<script> alert('Email or password is not correct please try again!!')</script> ";
        }
    }
} catch (PDOException $r) {
    echo $r->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: cursive;
            background-color: darkgrey;
        }

        input,
        label {
            display: block;
            width: 343px;
            height: 25px;
        }

        #btn2 {
            width: 343px;
            height: 50px;
            border-radius: 20px;
            cursor: pointer;
            margin-top: 20px;
            margin-left: 6px;
            background-color: red;
            font-weight: 900
        }

        #container {
            text-align: center;
            margin-bottom: 20px;
        }

        #inputstext {
            text-align: left;
            /* margin-top: 10px; */
        }
    </style>
</head>

<body>

    <div id="container">
        <h1>Login</h1>
        <p>Welcome back :)</p>
        <form action="#" method="POST">
            <div id="inputstext">
                <label for="email">Email</label>
                <input name="email" id="email" class="input" type="email" value="" required><br>

                <label for="pass">Password</label>
                <input name="pass" id="pass" class="input" type="password" value="" required><br>

            </div>
            <button id="btn2" name="login" type="submit">Login</button>
        </form>
    </div>

</body>

</html>