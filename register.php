<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register| APHub</title>
    <link rel="stylesheet" href="home/style.css">
</head>

<body>
    <img src="home/logo.png" id="nav-icon">
    <h1 id="main-text-center">Register Your Account!</h1>
    <form method="post" class="login-box" enctype="multipart/form-data">
        <form method="get">

            <br>

            <img src="home/logo.png" id="nav-icon">

            <br>

            <label id="login-field-text">Username:</label>
            <input type="text" name="user_name" required id="login-field">

            <br>
            <br>

            <label id="login-field-text">Email:</label>
            <input type="email" name="user_email" required id="login-field" style="text-align: center;">

            <br>
            <br>

            <label id="login-field-text">Password:</label>
            <input type="password" name="user_password" required id="login-field" style="text-align: center;">

            <br>
            <br>

            <label id="login-field-text">Confirm Password:</label>
            <input type="password" name="confirm_password" required id="login-field" style="text-align: center;">

            <br>
            <br>

            <button class="button" name="regBtn" id="nav-btn">Register</button>

            <br>

        </form>
    </form>

    <script>
        document.getElementById('nav-icon').onclick = function () {
            window.location.href = 'home.php';
        };

    </script>

    <?php
    if (isset($_POST['regBtn'])) {
        include("conn.php");

        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $user_edu = $_GET['role'];

        function validateStudentEmail($email)
        {
            // Use a regular expression to validate the student email format
            $pattern = '/^TP\d{6}@mail\.apu\.edu\.my$/';
            return preg_match($pattern, $email);
        }

        // Function to validate lecturer email
        function validateLecturerEmail($email)
        {
            // Use a regular expression to validate the lecturer email format
            $pattern = '/^[a-zA-Z0-9._%+-]+@apu\.edu\.my$/';
            return preg_match($pattern, $email);
        }

        // Function to display an error message
        function displayError($message)
        {
            echo '<p>Error: ' . $message . '</p>';
        }

        if ($_POST["user_password"] === $_POST["confirm_password"]) {
            if ($user_edu == 'student') {
                if (!validateStudentEmail($user_email)) {
                    displayError('Invalid email format!');
                }
            } elseif ($role === 'lecturer') {
                if (!validateLecturerEmail($user_email)) {
                    displayError('Invalid email format!');
                }
            } else {
                displayError('Invalid role');
            }

            $sql = "INSERT INTO user (user_name, user_password, user_email, user_edu) VALUES ('$user_name','$user_password','$user_email','$user_edu')";

            $stmt = mysqli_prepare($con, $sql);

            mysqli_stmt_execute($stmt);

            $check = mysqli_stmt_affected_rows($stmt);

            if ($check == 1) {
                echo "<script>alert('Sucessfully registered!'); window.location.href='login.php';</script>";
            }

            mysqli_close($con);

        } else {
            echo "Password confirmation failed.";
        }
    }
    ?>
</body>

</html>