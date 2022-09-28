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
