<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register |APHub</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
    Username<br>
    <input type="text" name="user_name" required><br><br>

    Email<br>
    <input type="email" name="user_email" required><br><br>

    Password<br>
    <input type="password" name="user_password" required><br><br>

    Confirm Password<br>
    <input type="password" name="confirm_password" required><br><br>

    <button class="button" name="regBtn">Register</button>
    </form>
    <?php
    if (isset($_POST['regBtn'])) {
        include("conn.php");
        
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        if ($_POST["user_password"] === $_POST["confirm_password"]) {
            $sql = "INSERT INTO user (user_name, user_password, user_email) VALUES ('$user_name','$user_password','$user_email')";

        $stmt = mysqli_prepare($con, $sql);

        mysqli_stmt_execute($stmt);

        $check = mysqli_stmt_affected_rows($stmt);

        if ($check == 1) {
            echo "<script>alert('Sucessfully registered!'); window.location.href='login.php';</script>";
        }

        mysqli_close($con);

         }
         else {
            echo "Password confirmation failed.";
         }
    }
    ?>
</body>
</html>