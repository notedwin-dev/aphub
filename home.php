<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="shortcut icon" href="home/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="home/style.css">

</head>

<body>
    <div id="top-bar">
        <img src="home/logo.png" id="nav-icon">
        <input type="text" placeholder="Enter Quiz Code..." id="quiz-code-input">
        <div>

            <?php
            if ($_SESSION["mySession"]) {
                ?>
                Welcome
                <?php echo $_SESSION["mySession"]; ?>. <input type="button" value="Logout" id="nav-btn"
                    onclick="window.location.href= 'logout.php'">
                <?php
            } else
                echo "<input type=\"button\" value=\"Register\" id=\"nav-btn\"
                onclick=\"window.location.href = 'select-role.php?action=register'\">
            <input type=\"button\" value=\"Login\" id=\"nav-btn\"
                onclick=\"window.location.href = 'select-role.php?action=login'\">";
            ?>
            <i class="fa fa-bars fa-2x" id="menu-icon" style="display:none;"></i>
        </div>
    </div>

    <br>

    <div id="top-navigation">
        <div id="left-nav">
            <ul>
                <ul><input type="button" value="Home" id="left-btn" onclick="window.location.href = 'home.php'"></ul>
                <br>
                <ul><input type="button" value="New Quiz" id="left-btn" onclick="window.location.href = 'new-quiz.php'">
                </ul>
                <br>
                <ul><input type="button" value="Users" id="left-btn" onclick="window.location.href = 'allusers.php'">
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