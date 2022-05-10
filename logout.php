<?php

session_start();
// if user logged in unset it from the session basicly logging out!
//session gives us the current user which is logged in the website.
if (isset($_SESSION['user_id'])) {
  unset($_SESSION['user_id']);
}
header("Location: login.php");
die;
