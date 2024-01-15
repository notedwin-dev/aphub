<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="home/style.css">
    <style>
        #middle-content {
            text-align: center;
            padding: 20px;
        }

        .user-card {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px;
            display: inline-block;
            width: 150px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div id="top-bar">
        <img src="home/logo.png" id="nav-icon">
        <input type="text" placeholder="Enter Quiz Code..." id="quiz-code-input">
        <div>
            <input type="button" value="Logout" id="nav-btn" onclick="window.location.href= 'logout.php'">
            <i class="fa fa-bars fa-2x" id="menu-icon" style="display:none;"></i>
        </div>
    </div>

    <br>

    <div id="top-navigation">
        <div id="left-nav">
            <ul>
                <ul><input type="button" value="Home" id="left-btn" onclick="window.location.href = 'home.php'"></ul>
                <br>
                <ul><input type="button" value="New Quiz" id="left-btn" onclick="window.location.href"></ul>
                <br>
                <ul><input type="button" value="Users" id="left-btn" onclick="window.location.href = 'AllUsers'"></ul>
            </ul>
        </div>

        <div id="middle-content">
            <h2>All Users</h2>
            <?php
            $users = [
                ['name' => 'User 1', 'role' => 'Student'],
                ['name' => 'User 2', 'role' => 'Lecturer'],
                ['name' => 'User 3', 'role' => 'Student'],
                ['name' => 'User 4', 'role' => 'Lecturer'],
                ['name' => 'User 5', 'role' => 'Student'],
                ['name' => 'User 6', 'role' => 'Lecturer'],
                ['name' => 'User 7', 'role' => 'Student'],
                ['name' => 'User 8', 'role' => 'Lecturer'],
            ];

            foreach ($users as $user) {
                echo '<div class="user-card">';
                echo '<p>' . $user['name'] . '</p>';
                echo '<p>' . $user['role'] . '</p>';
                echo '</div>';
            }
            ?>
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
