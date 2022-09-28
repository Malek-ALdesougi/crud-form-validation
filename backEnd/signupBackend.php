<?php
include_once("connection.php");

try {
    if (isset($_POST['siginupButton'])) {

        $email = $_POST['email'];
        $number = $_POST['number'];
        $fullName = $_POST['fullname'];
        $birth = $_POST['birth'];
        $pass1 = $_POST['pass'];
        $pass2 = $_POST['pass2'];
        $creatDate = date("Y/M/D");
        $defaultDate = date("Y/M/D");

        //UPLOADING THE IMAGE 
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "./images/" . $filename;


        // select statement to check the email;
        $query = $connection->prepare("SELECT `email` FROM `users data` WHERE `email` = ?");
        $query->bindValue(1, $email);
        $query->execute();

        // checking the age of the user 
        $currentDate = date("d-m-Y"); //today's date
        $currentDate = new DateTime($currentDate);
        $birth = new DateTime($birth);

        $interval = date_diff($currentDate, $birth);
        $userAge = $interval->y;


        // checking if the email exist in the database or not 
        if ($query->rowCount() > 0) {
            echo "<script> alert('This email is used')</script>";
        }
        // age checking if more that 16 
        elseif ($userAge < 16) {
            echo "<script> alert('Your age must be more than 16 honey go play with your toys!!')</script>";

            //check if the password match the confirm password
        } elseif ($pass1 != $pass2) {
            echo "<script> alert('Password must match confirm Password!! ')</script>";
        } else {
            // return the value of $birth to string because it can't be converted form DateTime ;
            $birth = $_POST['birth'];
            // pushing the user inputs to the database
            $sql = "INSERT INTO `users data` (email, number, fullname, dataofbirth, password, confirmpassword, DateCreated, lastLogin, image) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?) ";
            $stmt = $connection->prepare($sql);
            $stmt->execute([$email, $number, $fullName, $birth, $pass1, $pass2, $creatDate, $defaultDate, $filename]);

            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $folder)) {
                // echo "<h3>  Image uploaded successfully!</h3>";
            } else {
                echo "<h3>  Failed to upload image!</h3>";
            }

            header("Location: login.php");
        }
    }
} catch (PDOException $e) {
    echo  $e->getMessage();
}
