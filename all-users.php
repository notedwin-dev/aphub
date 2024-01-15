<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <link rel="stylesheet" href="../home/style.css">
</head>

<body>
    <?php
    include("components/navbar.php");
    ?>

    <br>

    <div id="top-navigation">
        <div id="left-nav">
            <ul>
                <ul><input type="button" value="Home" id="left-btn" onclick="window.location.href = '../home/'">
                </ul>
                <br>
                <ul><input type="button" value="New Quiz" id="left-btn" onclick="window.location.href = 'new-quiz.php'">
                </ul>
                <br>
                <ul><input type="button" value="Users" id="left-btn" onclick="window.location.href = 'all-users/'"></ul>
            </ul>
        </div>

        <div id="middle-content">
            <h2>All Users</h2>
            <?php
            include("conn.php");
            $query = "SELECT * FROM user";
            $result = mysqli_query($con, $query);

            if ($result) {
                while ($user = mysqli_fetch_assoc($result)) {
                    echo '<div class="user-card">';
                    echo '<p>' . $user['user_name'] . '</p>';
                    echo '<p>' . $user['user_edu'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo "Error: " . mysqli_error($con);
            }

            mysqli_close($con);
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