<?php include_once("../backEnd/signupBackend.php") ?>
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