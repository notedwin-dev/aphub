<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Overview | APHub</title>
    <link rel="stylesheet" href="/aphub/home/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <?php
    include("components/navbar.php");
    ?>

    <div id="top-navigation">
        <div id="left-nav">
            <ul>
                <ul><input type="button" value="Home" id="left-btn" onclick="window.location.href = '/aphub/home/'">
                </ul>
                <br>
                <ul><input type="button" value="New Quiz" id="left-btn"
                        onclick="window.location.href = '/aphub/new-quiz/'">
                </ul>
                <br>
                <ul><input type="button" value="Users" id="left-btn"
                        onclick="window.location.href = '/aphub/all-users/'">
                </ul>
            </ul>
        </div>

        <div id="middle-quiz-content">
            <div class="quiz-overview-container" style="color: white;">
                <?php
                include("conn.php");
                $query = "SELECT * FROM quiz WHERE quiz_id='$_GET[quiz_id]'";


                $result = mysqli_query($con, $query);

                if ($result) {
                    while ($quiz = mysqli_fetch_assoc($result)) {
                        $admin = mysqli_query($con, "SELECT * FROM user WHERE user_id='$quiz[admin_id]'");

                        while ($user = mysqli_fetch_assoc($admin)) {
                            $admin_name = $user['user_name'];
                        }
                        ?>

                        <div class="quiz-info">
                            <h1>Quiz Overview</h1>
                            <?php
                            echo '<h2>' . $quiz['quiz_name'] . '</h2>';
                            echo '<p>' . $admin_name . ' • asked 1 hour ago</p>';
                            echo "<button class=\"fas fa-thumbs-up\" style=\"background-color: #4a4a4a; border: none;\">" . '<p>' . $quiz['quiz_upvote'] . '</p>' . '</button>';
                            echo '<p>' . $quiz['quiz_description'] . '</p>';
                            ?>

                            <div class="quiz-details">
                                <span class="icon">🔥</span>
                                <span class="text">10 questions</span>
                            </div>
                            <div class="quiz-tags">
                                <?php
                                echo '<span class="tag">#' . $quiz['quiz_type'] . '</span>';
                    }
                } else {
                    echo "Error: " . mysqli_error($con);
                }

                mysqli_close($con);
                ?>
                        <span class="tag">Code:
                            <?php echo $_GET['quiz_id'] ?>
                        </span>
                        <button class="join-button">Join Quiz</button>
                    </div>
                </div>
                <div class="comment-section">
                    <h3>3 Comments</h3>
                    <div class="comment">
                        <p class="commenter">Edwin Ng • commented 54 minutes ago • 0 replies</p>
                        <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="comment">
                        <p class="commenter">Louis Lam • replied 2 minutes ago</p>
                        <p class="comment-text">vivamus at augue eget arcu dictum varius duis at consectetur lorem donec
                        </p>
                    </div>
                    <div class="comment">
                        <p class="commenter">Alvis Lai • replied 2 minutes ago</p>
                        <p class="comment-text">posuere morbi leo urna molestie at elementum eu facilisis sed odio
                            morbi.</p>
                    </div>
                </div>
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

</body>

</html>