<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Quiz</title>
</head>

<body>
    <?php
    include("components/navbar.php");
    ?>

    <br>

    <div id="top-navigation">
        <div id="left-nav">
            <ul>
                <li><input type="button" value="Home" id="left-btn" onclick="window.location.href = '../home/'"></li>
                <br>
                <li><input type="button" value="New Quiz" id="left-btn" onclick="window.location.href = '../new-quiz/'">
                </li>
                <br>
                <li><input type="button" value="Users" id="left-btn" onclick="window.location.href = '../all-users/'">
                </li>
                <br>
                <li>
                    <input type="button" value="Topics" id="left-btn" onclick="window.location.href = '../topics.php'">
                </li>
                <br>
                <li>
                    <input type="button" value="My Profile" id="left-btn"
                        onclick="window.location.href = '../user.php?user_id=<?php echo $_SESSION['user_id']; ?>'">
                </li>
            </ul>
        </div>

        <div id="middle-content">
            <h2 style="margin-top: 100px; margin-left: auto; margin-right: auto;">Create a new Quiz</h2>
            <div class="login-box">

                <form method="post">
                    <br>
                    <br>
                    <input type="text" placeholder="Quiz Name" name="quiz_name" id="login-field">
                    <br>
                    <br>
                    <input type="text" placeholder="Quiz Description" name="quiz_description" id="login-field">
                    <br>
                    <br>
                    <input type="text" placeholder="Quiz Category" name="quiz_category" id="login-field">
                    <br>
                    <br>
                    <input type="submit" value="Create" name="quiz_create" id="login-btn">
                </form>
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
</body>

</html>

<?php
include("conn.php");
include("session.php");
if (!isset($_SESSION['user_id'])) {
    header("location: /aphub/select-role.php?action=login");
} else {
    if (isset($_POST['quiz_create'])) {
        $quiz_name = $_POST['quiz_name'];
        echo ("<script>console.log('PHP: " . $quiz_name . "');</script>");
        $quiz_description = $_POST['quiz_description'];
        $quiz_category = $_POST['quiz_category'];
        $admin_id = $_SESSION['user_id'];

        $query = "INSERT INTO `quiz`(`quiz_name`, `quiz_description`, `quiz_type`, `admin_id`) VALUES ('$quiz_name','$quiz_description','$quiz_category', '$admin_id')";
        $result = mysqli_query($con, $query);

        if ($result) {
            $new_result = mysqli_query($con, "SELECT * FROM quiz WHERE quiz_name='$quiz_name'");

            if ($new_result) {
                while ($quiz = mysqli_fetch_assoc($new_result)) {
                    $quiz_id = $quiz['quiz_id'];
                    echo ("<script> alert('Quiz Created successfully!')</script>");
                    header("location: /aphub/quiz.php?quiz_id=$quiz_id");
                }
            } else {
                echo "Error: " . mysqli_error($con);
            }
        } else {
            echo "<script>alert('Quiz Creation Failed!')</script>";
        }
    }
}