<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="home/style.css">

</head>

<body>
    <div id="top-bar">
        <img src="home/logo.png" id="nav-icon">
        <input type="text" placeholder="Enter Quiz Code..." id="quiz-code-input">
        <div>
            <input type="button" value="Register" id="nav-btn" onclick="window.location.href = '../select-role.php?action=register'">
            <input type="button" value="Login" id="nav-btn" onclick="window.location.href = '../select-role.php?action=login'">
            <i class="fa fa-bars fa-2x" id="menu-icon" style="display:none;"></i>
        </div>
    </div>

    <br>

    <div id="top-navigation">
        <div id="left-nav">
            <ul>
                <ul><input type="button" value="Home" id="left-btn" onclick="window.location.href = 'home/'"></ul>
                <br>
                <ul><input type="button" value="New Quiz" id="left-btn" onclick="window.location.href"></ul>
                <br>
                <ul><input type="button" value="Users" id="left-btn" onclick="window.location.href"></ul>
            </ul>
        </div>

        <div id="middle-content">
            <h2 id="main-text-center">My Profile</h2>
            <div class="user-details-box">
                <ul>
                    <form method="post">
                        <h2 style="float:left">
                        <?php
                            include("conn.php");
                            $query = "SELECT * FROM user WHERE user_id='$_GET[user_id]'";
                            $result = mysqli_query($con, $query);
                            
                            if ($result) {
                                $user_details = mysqli_fetch_array($result);
                                echo "$user_details[user_name]";
                            } else {
                                echo "Error: " . mysqli_error($con);
                            }
                            
                            mysqli_close($con);
                        ?>
                        </h2>
                        <!-- put bio here -->

                        <button class="button" id="editbtn">Edit Profile</button>

                    </form>
                    <div id="activities">
                        <h3>Recent Activities</h3>
                        <div id="overview-box"></div>
                    </div>
                </ul>
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

    <footer>
        <p>&copy; 2024 APHub. All rights reserved.</p>
    </footer>
</body>

</html>