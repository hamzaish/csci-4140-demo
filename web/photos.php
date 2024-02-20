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
        <?php
            $sql = "SELECT encode(img::bytea, 'base64') FROM images WHERE public=true";
            $result = $conn->query($sql);
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            $array = array();
            foreach($data as $row){
                $img = base64_decode($row["img"]);
                echo '<img src="data:image/jpeg;base64,' . $img . '" />';
                array_push($array, $row['img']);
            }
        ?>
    </div>
    <div>
        <link href="./index.css" rel="stylesheet" />
        <form action="edit-photo.php" method="post" enctype="multipart/form-data">
            <input type="file" name="image" id="image">
            <input type="checkbox" id="public" name="public" checked/>
            <label for="public">Public?</label>
            <input type="submit" name="submit" value="Upload Photo">
        </form>
    </div>
  </body>
</html>