<?php

function check_login($con)
{

  if (isset($_SESSION['user_id'])) {

    $id = $_SESSION['user_id'];
    $query = "select * from users where user_id = '$id' limit 1";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
      $user_data = mysqli_fetch_assoc($result);
      // it returns the all datas of the user which logged in to the website.
      return $user_data;
    }
  }
  //redirect to login

  header("Location: login.php");
  die;
}

function random_num($lenght)
{
  //generates random user id also we have a normal id that we use for the purpose of primary key!
  $text = "";
  if ($lenght < 5) {
    $lenght = 5;
  }

  $len = rand(4, $lenght);

  for ($i = 0; $i < $len; $i++) {

    # code...
    $text .= rand(0, 9);
  }
  return $text;
}
