<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        body {
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        form {
            width: fit-content;
            height: fit-content;
            padding: 30px;
            border-radius: 10px;
            box-shadow: -10px 10px 10px grey;
        }

        h1 {
            text-align: center;
            font-weight: 100;
            margin-bottom: 30px;
        }

        input {
            width: 300px;
            height: 40px;
            padding-inline-start: 5px;
            margin: 10px;
            background-color: lightgray;
            border: none;
        }

        input:focus {
            outline: none;
        }

        #submit_btn {
            background-color: lightgray;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 100;
            color: #333;
            box-shadow: -2px 3px 10px grey;
            border: none;
            cursor: pointer;
        }

        label {
            font-size: 14px;
        }
        .register {
            text-align: center;
            margin: 10px 0;
        }

        .register p {
            font-size: 14px;
            font-weight: 100;
        }
    </style>
</head>
<body>
<form action="./login_process.php" method="POST">
        <div>
            <h1>Sign In</h1>
        </div>
        <div class="username">
            <label for="username">Username:</label><br>
            <input type="text" name="username" require>
        </div>
        <div class="password">
            <label for="password">Password:</label><br>
            <input type="password" name="password" require>
        </div>
        <input id="submit_btn" type="submit" value="Login" name="submit">
        <div class="register">
            <p>Dont have an accout? <a href="./register/register.php">Sign up</a></p>
        </div>
</body>
</html>