<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        #favicon {
            padding-bottom: 5px;
            border-radius: 10px;
            border: none;
            width: fit-content;
            height: 32px;
            justify-content: center;
        }
    </style>
</head>
<body>
    <img src="home/logo.png" id="favicon">
    <form method="post">
        <h1>Welcome back!</h1>
        <form method="get">
            <label>Username:</label>
            <input type="text" name="username" required><br>
            <label>Password: </label>
            <input type="password" name="password" required><br>
            <input type="submit" value="Login" name="loginBtn">
        </form>

        <p>Dont have an account? <a href="select-role.php?action=register">Create one</a>.</p>
    </form>

    <?php
    include("conn.php");
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM user WHERE user_email='$username' and user_password='$password'";
        $result = mysqli_query($con, $sql);

        $rowcount = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);
        if ($rowcount == 1) {
            session_start();
            $_SESSION['mySession'] = $row['id'];
            header("location: view.php");
        } else {
            echo "Your Login Name or Password is Wrong. Please re-login";
        }
        mysqli_close($con);
    }
    ?>
</body>
</html>