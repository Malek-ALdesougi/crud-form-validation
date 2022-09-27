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

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Page</title>
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
    <!-- TEST THE IMAGE UPLOADING FROM THE USER -->

    <!-- <div class="image">
        <?php
        try {
            $sql = "SELECT image FROM `users data`";
            $stmt = $connection->prepare($sql);
            $stmt->execute();
            $images = $stmt->fetchAll();

        ?>
        <?php foreach ($images as $img) { ?>
            <img width="100px" height="100px" src="./images/<?php echo $img['image']; ?>" alt="image">
             <img width="100px" height="100px" src="images\20395274.jpg"> 
        <?php }
        } catch (PDOException $d) {
            echo "not" . $d->getMessage();
        }
        ?> -->


    </div>

    <div id="container">
        <h1>SiginUp</h1>
        <p>Create an account it's free !! </p>
        <form action="signup.php" method="POST" enctype="multipart/form-data">
            <div id="inputstext">

                <label for="email">Email</label>
                <input name="email" id="email" class="input" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" oninvalid="this.setCustomValidity('email must contain @ and . ')" oninput="this.setCustomValidity('')" required><br>

                <label for="pass">Mobile Number</label>
                <input name="number" class="input" id="pass" type="text" pattern="(^[0-9]{14}$).*" oninvalid="this.setCustomValidity('Number must be at least 14 digits')" oninput="this.setCustomValidity('')" required><br>

                <label for="fullname">Full Name</label>
                <input name="fullname" id="fullname" class="input" type="text" pattern="(\w+\s{1}\w+\s{1}\w+).*" oninvalid="this.setCustomValidity('full name must contain first/middle/last')" oninput="this.setCustomValidity('')" required><br>

                <label for="birth">Date Of Birth</label>
                <input name="birth" id="birth" class="input" type="date" required><br>

                <label for="pass">Password</label>
                <input name="pass" id="pass" class="input" type="password" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$" oninvalid="this.setCustomValidity('password must consist at least 8 characters at least 1 uppercase and 1 lowecase and 1 special cahracter and 1 number')" oninput="this.setCustomValidity('')" required><br>

                <label for="pass2">Confirm Password</label>
                <input name="pass2" id="pass2" class="input" type="password" required>

                <label for="image">Image</label>
                <input style="background-color:white; height:30px;" name="uploadfile" value="" type="file" required>
            </div>
            <!-- |audio/*|video/*| -->
            <button id="btn2" name="siginupButton" type="submit">Sigin up</button>
        </form>
    </div>
</body>

</html>