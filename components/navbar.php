<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/aphub/home/style.css">
</head>

<body>
    <div id="top-bar">
        <a href="/aphub/home/"><img src="/aphub/home/logo.png" id="nav-icon"></a>
        <input type="text" placeholder="Enter Quiz Code..." id="quiz-code-input">
        <div>
            <?php
            include("session.php");
            if (isset($_SESSION["user_name"])) {
                ?>
                Welcome
                <?php echo $_SESSION["user_name"]; ?>. <input type="button" value="Logout" id="nav-btn"
                    onclick="window.location.href= '/aphub/logout.php'">
                <?php
            } else
                echo "<input type=\"button\" value=\"Register\" id=\"nav-btn\"
                onclick=\"window.location.href = '../select-role.php?action=register'\">
            <input type=\"button\" value=\"Login\" id=\"nav-btn\"
                onclick=\"window.location.href = '../select-role.php?action=login'\">";

            ?>


            <i class="fa fa-bars fa-2x" id="menu-icon" style="display:none;"></i>
        </div>
    </div>
</body>

</html>