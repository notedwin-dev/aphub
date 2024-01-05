<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Home</title>
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="home/style.css">
</head>

<body>
    <nav>
        <img src="home/logo.png" id="nav-icon">
        <input type="text" placeholder="Enter Quiz Code...">
        <div>
            <input type="button" value="Register" id="register-btn">
            <input type="button" value="Login" id="login-btn">
            <i class="fa fa-bars fa-2x" style="display:none"></i>
        </div>
    </nav>

    <script>
        document.getElementById('nav-icon').onclick = function () {
            window.location.href = 'home.php';
        };

        document.getElementById('register-btn').onclick = function () {
            window.location.href = 'register.php';
        };

        document.getElementById('login-btn').onclick = function () {
            window.location.href = 'login.php';
        };
        
    </script>

    <footer>
        <p>&copy; 2024 APHub. All rights reserved.</p>
    </footer>
</body>

</html>
