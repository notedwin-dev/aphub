<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hot Topics</title>
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="home/style.css">
    <style>
        #middle-content {
            text-align: center;
            padding: 20px;
        }
    </style>
</head>

<body>
    <?php
    include("components/navbar.php");
    ?>

    <br>

    <div id="top-navigation">
        <div id="left-nav">
            <ul>
                <li><input type="button" value="Home" id="left-btn" onclick="window.location.href = './home/'"></li>
                <br>
                <li><input type="button" value="New Quiz" id="left-btn" onclick="window.location.href = './new-quiz/'">
                </li>
                <br>
                <li><input type="button" value="Users" id="left-btn" onclick="window.location.href = './all-users/'">
                </li>
                <br>
                <li>
                    <input type="button" value="Topics" id="left-btn" onclick="window.location.href = './topics.php'">
                </li>
                <br>
                <li>
                    <input type="button" value="My Profile" id="left-btn"
                        onclick="window.location.href = './user.php?user_id=<?php echo $_SESSION['user_id']; ?>'">
                </li>
            </ul>
        </div>

        <div id="middle-content">
            <h2>Hot Topics</h2>
            <?php
            include("conn.php");
            $query = "SELECT * FROM quiz";
            $result = mysqli_query($con, $query);

            if ($result) {
                while ($user = mysqli_fetch_assoc($result)) {
                    echo '<div class="topic-card">';
                    echo '<a href="./quiz.php?quiz_id=';
                    echo $user['quiz_id'];
                    echo '"';
                    echo 'style="text-decoration: none; color: black;">';
                    echo '<p>' . $user['quiz_name'] . '</p>';
                    echo '<p>' . $user['quiz_type'] . '</p>';
                    echo '<p>' . $user['quiz_upvote'] . ' upvotes' . '</p>';
                    echo '</a>';
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
                    <?php
                    include("conn.php");
                    $query = "SELECT * FROM quiz ORDER BY quiz_upvote DESC";
                    $result = mysqli_query($con, $query);

                    if ($result) {
                        while ($quiz = mysqli_fetch_assoc($result)) {
                            echo '<li>' . $quiz['quiz_name'] . '</li>';
                        }
                    } else {
                        echo "Error: " . mysqli_error($con);
                    }

                    mysqli_close($con);
                    ?>
                </ul>
            </div>

            <br>

            <div id="hot-topics">
                <h2>Hot Topics</h2>
                <ul style=" list-style-type: none;">
                    <?php
                    include("conn.php");
                    $query = "SELECT DISTINCT quiz_type, quiz_upvote FROM quiz ORDER BY quiz_upvote DESC";
                    $result = mysqli_query($con, $query);

                    if ($result) {
                        while ($quiz = mysqli_fetch_assoc($result)) {
                            echo '<li>' . $quiz['quiz_type'] . '</li>';
                        }
                    } else {
                        echo "Error: " . mysqli_error($con);
                    }

                    mysqli_close($con);
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 APHub. All rights reserved.</p>
    </footer>
</body>

</html>