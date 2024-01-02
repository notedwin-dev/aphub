<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role Selection</title>
    <style>
        #favicon {
            padding-bottom: 5px;
            border-radius: 10px;
            border: none;
            width: fit-content;
            height: 32px;
            justify-content: center;
        }
    </style>
</head>

<body>
    <img src="home/logo.png" id="favicon">
    <h1>Select your account type!</h1>
    <form method="post">
        <input type="submit" name="lecturer" value="I'm a Lecturer" class="button">

        <h1>OR</h1>

        <input type="submit" name="student" value="I'm a Student" class="button">
    </form>

    <?php
      
      if(isset($_POST['lecturer'])) { 
        header('location: register.php?action=lecturer');
      } 
      if(isset($_POST['student'])) { 
        header('location: register.php?action=student');
      } 
  ?> 

</body>

</html>