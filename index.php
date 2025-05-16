<?php
session_start();
include "db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = md5($_POST["password"]);

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Username atau Password salah.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial;
            background: #f8c6e3;
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
        }
        .login-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px pink;
            width: 300px;
        }
        .login-box h2 {
            text-align: center;
            color: #d63384;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background: #d63384;
            color: white;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <form class="login-box" method="post">
        <h2>Login</h2>
        <?php if ($error) echo "<p class='error'>$error</p>"; ?>
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
