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
            <input type="text" placeholder="Quiz Name" id="login-field">
            <br>
            <br>
            <input type="text" placeholder="Quiz Description" id="login-field">
            <br>
            <br>
            <input type="text" placeholder="Quiz Category" id="login-field">
            <br>
            <br>
            <input type="text" placeholder="Quiz Code" id="login-field">
            <br>
            <br>
            <input type="submit" value="Create" id="login-btn">
        </form>
    </div>

</body>

</html>