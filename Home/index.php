<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div id="top-bar">
        <a href="../home"><img src="logo.png" id="nav-icon"></a>
        <input type="text" placeholder="Enter Quiz Code..." id="quiz-code-input">
        <div>
            <?php
            if (isset($_SESSION["user_name"])) {
                ?>
                Welcome
                <?php echo $_SESSION["user_name"]; ?>. <input type="button" value="Logout" id="nav-btn"
                    onclick="window.location.href= '../logout.php'">
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

    <br>

    <div id="top-navigation">
        <div id="left-nav">
            <ul>
                <ul><input type="button" value="Home" id="left-btn" onclick="window.location.href = './'"></ul>
                <br>
                <ul><input type="button" value="New Quiz" id="left-btn" onclick="window.location.href = '../new-quiz/'">
                </ul>
                <br>
                <ul><input type="button" value="Users" id="left-btn" onclick="window.location.href = '../all-users/'">
                </ul>
            </ul>
        </div>

        <div id="middle-content">
            <div id="top-categories">
                <h2>Top Quiz Categories</h2>
                <ul>
                    <form method="post">
                        <input type="text" placeholder="Search Quizzes..." id="quiz-code-input" style="width:90%">
                    </form>
                </ul>
            </div>
        </div>

        <div id="right-sidebar">
            <div id="hot-quizzes">
                <h2>Hot Quizzes</h2>
                <ul style=" list-style-type: none;">
                    <li>Quiz 1</li>
                    <li>Quiz 2</li>
                    <li>Quiz 3</li>
                </ul>
            </div>

            <br>

            <div id="hot-topics">
                <h2>Hot Topics</h2>
                <ul style=" list-style-type: none;">
                    <li>Topic 1</li>
                    <li>Topic 2</li>
                    <li>Topic 3</li>
                </ul>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 APHub. All rights reserved.</p>
    </footer>
</body>

</html>