<?php

session_start();

include("dbconnect.php");
include("functions.php");

$user_data = check_login($con);
$result = mysqli_query($con, "select * from users");




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome Page</title>
</head>

<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;

  }

  body {
    background-color: #F9F3EE;

    display: flex;
    justify-content: center;
    align-items: center;
    background-color: white;
    height: 95vh;
  }


  a {
    font-size: 20px;
  }

  .users-table table {
    border-collapse: collapse;
    margin: 150px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.35);

  }

  .users-table tr th {
    background-color: #009879;
    color: #ffffff;
    text-align: center;
  }

  .users-table th,
  .users-table td {
    padding: 12px 15px;
  }

  .anchor {
    display: block;
  }

  .anchor:hover {
    color: black;
  }
</style>

<body>
  <div class="home">
    <div class="start" style="text-align:center ;">
      <h1>WELCOME</h1>
      <h2>Hello, <?php echo $user_data['user_name']; ?></h2>
      <a class="anchor" href="logout.php">Logout</a>
      <a class="anchor" href="update.php">Update User Information</a>
    </div>


    <br>
    <div class="users-table">
      <?php
      echo "<table>
      <tr>
      <th>id</th>
        <th>user_name</th>
        <th>password</th>
        <th>date</th>
        <th>email</th>
        <th>phone</th>
        <th>address</th>




      </tr>" ?>
      <?php
      while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['user_name'] . "</td>";
        echo "<td>" . $row['password'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";

        echo "</tr>";
      }
      echo "
    </table>"; ?>


      <?php mysqli_close($con); ?>


    </div>

  </div>


</body>

</html>