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
            if(!isset($_SESSION["page"])){
                $_SESSION["page"] = 0;
            }
            $sql = "SELECT * FROM images WHERE public=true";
            $result = $conn->prepare($sql);
            $result->execute();
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            $user = $_COOKIE["username"];
            $sql2 = "SELECT * FROM images WHERE public=false AND name='$user'";
            $result2 = $conn->prepare($sql2);
            $result2->execute();
            $data2 = $result2->fetchAll(PDO::FETCH_ASSOC);
            $array = array();
            foreach($data as $row){
                $raw = stream_get_contents($row["img"]);
                array_push($array, $raw);
            }
            foreach($data2 as $row){
                $raw = stream_get_contents($row["img"]);
                array_push($array, $raw);
            }
            $length = count($array);
            if(!isset($_POST["next"]) and (($_SESSION["page"]*8)<$length)){
                $_SESSION["page"] = $_SESSION["page"]+1;
            }
            if(!isset($_POST["previous"]) and ($_SESSION["page"] > 0)){
                $_SESSION["page"] = $_SESSION["page"]-1;
            }
            $array = array_reverse($array);
            $show = array_splice($array, ($_SESSION["page"]*8), ($_SESSION["page"]*8)+8);
            foreach($show as $raw){
                echo "<img src='data:image/jpeg;charset=utf-8;base64,{$raw}' alt='Binary Image'/>";
            }
        ?>
    </div>
    <div>
        <link href="./index.css" rel="stylesheet" />
        <form method="post"> 
            <input type="submit" name="next"
                    class="button" value="Previous" /> 
            <input type="submit" name="previous"
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