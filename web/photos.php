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
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="image" id="image">
            <input type="checkbox" id="public" name="public" checked/>
            <label for="public">Public?</label>
            <input type="submit" name="submit" value="Upload Photo">
        </form>
    </div>
    <?php
    if (isset($_POST["submit"])) {
        $file_name = $_FILES["image"]["name"];
        $temp_name = $_FILES["image"]["tmp_name"];
        $folder = "image/$file_name";
        echo "<p>$file_name<p>";

    }
    ?>
  </body>
</html>