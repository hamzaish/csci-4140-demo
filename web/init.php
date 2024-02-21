<?php
    include('db_connect.php');
    if(isset($_POST['submit'])){
        echo "<h3>Are you sure you want to re-initialize the system?</h3>";
        echo "<form action='' method='post'>
                <input type='submit' name='confirm' value='Re-Initialize System'>
                <input type='submit' name='decline' value='Go Back'>
            </form>";
    }
    if(isset($_POST["confirm"])){
        $sql = "DELETE FROM images";
        $result = $conn->prepare($sql);
        $result->execute();
        echo '<meta http-equiv="refresh" content="0; url=photos.php">';
    }
    if(isset($_POST['decline'])){
        echo '<meta http-equiv="refresh" content="0; url=photos.php">';
    }
?>