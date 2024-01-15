<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="home/style.css">
</head>

<body>
    <div id="top-bar">
        <img src="home/logo.png" id="nav-icon">
        <input type="text" placeholder="Enter Quiz Code..." id="quiz-code-input">
        <div>
            <input type="button" value="Register" id="nav-btn"
                onclick="window.location.href = '../select-role.php?action=register'">
            <input type="button" value="Login" id="nav-btn"
                onclick="window.location.href = '../select-role.php?action=login'">
            <i class="fa fa-bars fa-2x" id="menu-icon" style="display:none;"></i>
        </div>
    </div>
</body>

</html>