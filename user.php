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
    <div id="top-bar">
        <img src="home/logo.png" id="nav-icon">
        <input type="text" placeholder="Enter Quiz Code..." id="quiz-code-input">
        <div>
            <input type="button" value="Logout" id="nav-btn" onclick="window.location.href= 'logout.php'">
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
                                            echo "$user_details[user_id]";
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
                            <button class="button" id="editbtn">Edit Profile</button>
                            <!-- put bio here -->
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget nisl tempor, congue orci eu,
                    blandit sem. Sed porta fermentum ipsum maximus volutpat. In posuere finibus ipsum sed mollis.</p>

  

                        </form>
                    </div>
                    <div class="section recent-activities">
                        <div>Recent Activities</div>
                        <div>
                            <button class= "tab" style="">Overview</button>
                            <button class= "tab">Quizzes</button>
                        </div>
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