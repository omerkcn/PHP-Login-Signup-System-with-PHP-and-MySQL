<?php
session_start();
include("dbconnect.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  //something was posted

  $username = $_POST['user_name'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  //hashing password to prevent from sql injections!!!
  $hashpassword = password_hash($password, PASSWORD_DEFAULT);

  //checking the form inputs whether they are empty or not?
  if (!empty($username) && !empty($password) && !is_numeric($username) && !empty($email) && !empty($phone) && !empty($address)) {


    $user_id = random_num(20);
    //inserting values into the columns of table order matters!
    $query = "insert into users (user_id,user_name,password,email,phone,address) values ('$user_id','$username','$hashpassword','$email','$phone','$address')";
    mysqli_query($con, $query);
    // heading to login page. (navigating)
    header("Location: login.php");
    die;
  } else {
    echo ("Blanks can not be empty please fill it!");
  }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Sign up</title>
</head>

<body>
  <!-- inline css to customize the form elements! -->
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

    #already {
      font-size: 20px;
      color: white;
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
      text-align: center;
      color: white;
    }
  </style>

  <div id="box">
    <form method="post">
      <h1>Sign up</h1>
      <input id="text" type="text" name="user_name" placeholder="Username">
      <br>
      <br>
      <input id="text" type="password" name="password" placeholder="Password">
      <br>
      <br>
      <input id="text" type="email" name="email" placeholder="example@gmail.com">
      <br><br>
      <input id="text" type="tel" name="phone" placeholder="+905532411424">
      <br><br>
      <textarea name="address" id="" cols="38" rows="10" placeholder="Address"></textarea>

      <br><br>
      <input id="button" type="submit" value="Sign up">




      <br><br>
      <p id="already">Already have an account</p>
      <!-- navigation-->
      <a href="login.php">Click to Login</a>
      <br><br>

    </form>


  </div>

</body>

</html>