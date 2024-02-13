<?php
    $connect = include('db_connect.php');
?>

<!DOCTYPE html>
<html lang="en">
  <body>
    <link rel="stylesheet" href="./style.css" />
    <div>
      <link href="./index.css" rel="stylesheet" />
      <?php
        if(!isset($_COOKIE["username"])){
            header("Location: login.php");
        }
        $username = $_COOKIE['username'];
        echo "<p>You are logged in as $username</p>";
      ?>
      <form action="logout.php" method="post"> 
        <input type="submit" value="Logout"> 
        </form>
    </div>
    <div>
        <link href="./index.css" rel="stylesheet" />
        <form action="upload-photo.php" method="post"> 
            <input type="submit" value="Upload a Photo"> 
        </form>
    </div>
  </body>
</html>