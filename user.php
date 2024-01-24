<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="home/style.css">

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
            <h2 id="main-text-center">My Profile</h2>
            <div class="user-details-box">
                <ul>
                    <div class="segment user-profile">
                        <form method="post">
                            <h2>
                                <?php
                                if (isset($_GET['user_id']) && !empty($_GET['user_id'])) {
                                    include("conn.php");

                                    // Sanitize the user_id to prevent SQL injection
                                    $user_id = mysqli_real_escape_string($con, $_GET['user_id']);

                                    $query = "SELECT * FROM user WHERE user_id='$user_id'";
                                    $result = mysqli_query($con, $query);

                                    if ($result) {
                                        $user_details = mysqli_fetch_array($result);

                                        if ($user_details) {
                                            echo "$user_details[user_name]";
                                            echo "<br>";
                                            echo "#$user_details[user_id]";
                                        } else {
                                            echo "Error: User not found";
                                        }
                                    } else {
                                        echo "Error: " . mysqli_error($con);
                                    }

                                    mysqli_close($con);
                                } else {
                                    echo "Error: 'user_id' parameter is empty or undefined";
                                }
                                ?>
                            </h2>
                            <button class="button" id="editbtn"
                                onclick="window.location.href = '/aphub/edit-profile.php'">Edit
                                Profile</button>
                            <!-- put bio here -->
                            <?php
                            echo "<p>$user_details[user_bio]</p>";
                            ?>



                        </form>
                    </div>
                    <div class="section recent-activities">
                        <div>Recent Activities</div>
                        <div>
                            <button class="tab" style="">Overview</button>
                            <button class="tab">Quizzes</button>
                        </div>
                    </div>
                </ul>
            </div>


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