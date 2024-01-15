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
            window.location.href = 'home/';
        };

    </script>

    <?php
    if (isset($_POST['regBtn'])) {
        include("conn.php");

        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $user_edu = $_GET['role'];

        // Create an array of accepted domains
        $accepted_domains = ['mail.apu.edu.my', 'apu.edu.my'];

        // Extract the domain from the user's email address
        $user_domain = substr(strrchr($user_email, "@"), 1);

        function insertIntoDataBase($user_name, $user_email, $user_password, $user_edu)
        {
            include("conn.php");
            $sql = "INSERT INTO user (user_name, user_email, user_password, user_edu) VALUES ('$user_name', '$user_email', '$user_password', '$user_edu')";
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo "<script>if(window.confirm(\"Account created successfully!\")) window.location.href = \"login.php?role=$user_edu\"</script>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
            mysqli_close($con);
        }

        // Function to display an error message
        function displayError($message)
        {
            echo '<script>if(window.confirm("' . $message . '")) window.location.href = "select-role.php?action=register"</script>';
        }

        if ($_POST["user_password"] === $_POST["confirm_password"]) {

            if (in_array($user_domain, $accepted_domains)) {
                // The domain is in the array of accepted domains
    
                // Check if the user is a student or lecturer
                if ($user_edu == 'student' && $user_domain == 'mail.apu.edu.my') {
                    insertIntoDataBase($user_name, $user_email, $user_password, $user_edu);
                } elseif ($user_edu == 'lecturer' && $user_domain == 'apu.edu.my') {
                    insertIntoDataBase($user_name, $user_email, $user_password, $user_edu);
                } else {
                    displayError('The selected role does not match the domain of the email address provided. Please make sure you register under the correct category.');
                }
            } else {
                displayError('Invalid domain');
            }
        } else {
            echo "Password confirmation failed.";
        }
    }
    ?>
</body>

</html>