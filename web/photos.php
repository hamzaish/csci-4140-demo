<?php
    $connect = include('db_connect.php');
    session_start();
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
        <?php
            $_SESSION["page"] = 0;
            $sql = "SELECT * FROM images WHERE public=true";
            $result = $conn->prepare($sql);
            $result->execute();
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            echo $data;
            $array = array();
            foreach($data as $row){
                echo $row['img'];
                echo "<img src='data:image/jpeg;charset=utf-8;base64,{$row['img']}' alt='Binary Image'/>";;
                array_push($array, $row['img']);
            }
        ?>
    </div>
    <div>
        <link href="./index.css" rel="stylesheet" />
        <form method="post"> 
            <input type="submit" name="previous"
                    class="button" value="Previous" /> 
            <input type="submit" name="next"
                    class="button" value="Next" /> 
        </form> 
        <form action="edit-photo.php" method="post" enctype="multipart/form-data">
            <input type="file" name="image" id="image">
            <input type="checkbox" id="public" name="public" checked/>
            <label for="public">Public?</label>
            <input type="submit" name="submit" value="Upload Photo">
        </form>
    </div>
  </body>
</html>