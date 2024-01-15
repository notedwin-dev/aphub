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