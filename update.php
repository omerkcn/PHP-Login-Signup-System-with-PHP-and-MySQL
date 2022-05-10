<?php
session_start();

include("dbconnect.php");
include("functions.php");

if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  //updating the user information according to the form elements!! where id = id of a person that you want to update
  $query = "UPDATE users SET user_name='$_POST[user_name]', password='$hashed_password', email='$_POST[email]',phone='$_POST[phone]',address='$_POST[address]'
  WHERE id='$_POST[id]'";
  mysqli_query($con, $query);
  header("Location: index.php");
  die;
}

?>

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
    display: block;
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


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Page</title>
</head>

<body>
  <div id="box">
    <h1>UPDATE PAGE</h1>

    <form action="" method="POST">
      <input id="text" type="text" name="id" placeholder="update the id that you want!">
      <br>
      <br>
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
      <input id="button" type="submit" value="Update Data" name="update">


    </form>

  </div>


</body>

</html>