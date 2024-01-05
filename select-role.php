<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Select Your Role</title>
  <link rel="stylesheet" href="home/style.css">
  <style>
    form {
      margin: 0;
      padding: 0;
      height: 77vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .button {
      width: 100%;
      height: 100%;
      padding: 15px;
      font-size: 20px;
      cursor: pointer;
      margin: 10px 0;
    }

    h1 {
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <img src="home/logo.png" id="nav-icon">
  <h1>
    <center>Select your account type!</center>
  </h1>
  <form method="post">
    <input type="submit" name="lecturer" value="I'm a Lecturer" class="button">

    <h2>OR</h2>

    <input type="submit" name="student" value="I'm a Student" class="button">
  </form>

  <script>
    document.getElementById('nav-icon').onclick = function () {
      window.location.href = 'home';
    };  
  </script>

  <?php

  if (isset($_POST['lecturer']) && isset($_GET['action'])) {
    header("location:" . $_GET["action"] . ".php?role=lecturer");
  }
  if (isset($_POST['student']) && isset($_GET['action'])) {
    header("location:" . $_GET["action"] . ".php?role=student");
  }
  ?>

</body>

</html>