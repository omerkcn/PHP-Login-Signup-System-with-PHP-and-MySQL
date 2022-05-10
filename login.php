<?php

session_start();
include("dbconnect.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  //something was posted

  $username = $_POST['user_name'];
  $password = $_POST['password'];

  if (!empty($username) && !empty($password) && !is_numeric($username)) {
    //reading from the database in order to compare whether the password is true or not!
    $query = "select * from users where user_name = '$username' limit 1";
    $result = mysqli_query($con, $query);

    if ($result) {
      if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        //special method password_verify in order to compare hashed pasword with the normal password for security purposes.!
        if (password_verify($password, $user_data['password'])) {

          $_SESSION['user_id'] = $user_data['user_id'];
          header("Location: index.php");
          die;
        }
      }
    }
    echo ("Wrong user name or password!!");
  } else {
    echo ("Please enter some valid information!");
  }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>
  <style type="text/css">
    body {
      display: flex;
      flex-direction: column;

      background-color: #F9F3EE;
      height: 95vh;
    }

    a {

      font-size: 20px;
      color: white;
      font-weight: bold;
    }

    #text {
      height: 25px;
      border-radius: 5px;
      padding: 4px;
      border: solid thin #aaa;
      width: 100%;
    }

    #button {
      padding: 10px;
      font-weight: bold;
      width: 100px;
      color: black;
      background-color: aqua;
      border: none;
      border-radius: 5px;
      box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;

    }

    a:hover {
      color: black;
    }

    #button:hover {
      background-color: bisque;
    }

    #already {
      font-size: 20px;
      color: white;
    }

    #box {
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: grey;
      margin: auto;
      background-color: #FF4949;
      width: 300px;
      padding: 20px;
      border-radius: 10px;
      box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
    }

    h1 {
      color: white;
      text-align: center;
    }
  </style>

  <div id="box">
    <form method="post">
      <h1>Login</h1>
      <input id="text" type="text" name="user_name" placeholder="username">
      <br>
      <br>
      <input id="text" type="password" name="password" placeholder="password">
      <br>
      <br>
      <input id="button" type="submit" value="Login">
      <br><br>
      <p id="already">Do not have an account yet?</p>
      <a href="signup.php">Click to Create</a>
      <br><br>

    </form>


  </div>

</body>

</html>