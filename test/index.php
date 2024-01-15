<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test File</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: white;
        }

        .quiz-overview-container {
            width: 80%;
            margin: 20px auto;
            background-color: #1a1a1a;
            border-radius: 10px;
            overflow: hidden;
        }

        .quiz-info {
            padding: 20px;
            background-color: #2a2a2a;
        }

        .quiz-info h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .quiz-info h2 {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .quiz-info p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .quiz-details {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .quiz-details span {
            margin-right: 10px;
        }

        .quiz-tags {
            display: flex;
            flex-wrap: wrap;
        }

        .quiz-tags span {
            margin-right: 10px;
            margin-bottom: 10px;
            padding: 5px;
            border-radius: 5px;
            background-color: #3a3a3a;
        }

        .join-button {
            float: right;
            padding: 5px 5px;
            border: none;
            border-radius: 5px;
            background-color: #4a4a4a;
            cursor: pointer;
        }

        .comment-section {
            padding: 20px;
            background-color: #1a1a1a;
        }

        .comment-section h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .comment {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            background-color: #2a2a2a;
        }

        .commenter {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .comment-text {
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="quiz-overview-container">
        <?php
        include("../conn.php");
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
                <p class="comment-text">vivamus at augue eget arcu dictum varius duis at consectetur lorem donec</p>
            </div>
            <div class="comment">
                <p class="commenter">Alvis Lai • replied 2 minutes ago</p>
                <p class="comment-text">posuere morbi leo urna molestie at elementum eu facilisis sed odio morbi.</p>
            </div>
        </div>
    </div>

</body>

</html>