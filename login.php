<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="home/style.css">
</head>

<body>
    <img src="home/logo.png" id="nav-icon">
    <h1 id="main-text-center">Welcome back!</h1>
    <form method="post" class="login-box">
        <form method="get">
            <img src="home/partyblahaj.gif" style="border-radius: 50%; border: 1px solid #ccc; margin-top: 10px;">
            <br>
            <label id="login-field-text">Username: </label>
            <input type="text" name="username" required id="login-field">

            <br>
            <br>

            <label id="login-field-text">Password: </label>
            <input type="password" name="password" required id="login-field" style="text-align: center;">

            <br>
            <br>

            <input type="submit" value="Login" name="loginBtn" id="nav-btn">
            <p>Dont have an account? <a href="select-role.php?action=register">Create one</a>.</p>

        </form>

    </form>

    <script>
        document.getElementById('nav-icon').onclick = function () {
            window.location.href = 'home/';
        };

    </script>

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
            header("location: home.php");
        } else {
            echo "Your Login Name or Password is Wrong. Please re-login";
        }
        mysqli_close($con);
    }
    ?>
</body>

</html>