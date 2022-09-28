<?php include_once("../backEnd/loginBackend.php") ?>
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