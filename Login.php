<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0"> 
    <style>
        body {
            font-family: "Arial", sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f8f8;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
            width: 320px;
            padding: 40px;
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 30px;
            font-size: 28px;
        }
        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease-in-out;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #6c63ff;
        }
        input[type="submit"] {
            width: calc(100% - 20px);
            padding: 12px;
            border: none;
            border-radius: 6px;
            background-color: #6c63ff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }
        input[type="submit"]:hover {
            background-color: #574fcf;
        }

        p.error-message {
            color: #ff0000;
            margin-top: 10px;
        }
    </style>
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="post" action="Login.php">
            <label for="username">Username:</label>
            <input type="text" name="UserName" id="username" required><br>
            <p class="error-message"><?php if (!empty($error)) echo $error; ?></p>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>
            <p class="error-message"><?php if (!empty($error)) echo $error; ?></p>

            <input type="submit" value="Login">
        </form>
        <?php
            session_start();
            $username = "Soham Saha"; // Replace with your actual username
            $password = "Soham123"; // Replace with your actual password
            if(isset($_POST["UserName"])){
                                // Simulate login verification (Replace this with a proper authentication mechanism)
                if ($_POST["UserName"] === $username && $_POST["password"] === $password) {
                    $_SESSION["loggedin"] = true;
                    header("Location: TablePage.php");
                    exit;
                } else {
                    echo "Invalid username or password";
                }
            }


        ?>
    </div>
</body>
</html>
