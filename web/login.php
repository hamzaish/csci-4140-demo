<?php
    include('db_connect.php');
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $pass = $_POST['password'];
        $sql = "SELECT FROM myusers WHERE name='$username' AND passwords='$pass'";
        $result = $conn->query($sql);
        $rows = $result->rowCount();
        
        if($rows == 1){
            setcookie('username', $username, time()+3600);
            header("Location: photos.html");
        }
        else{
            header("Location: log-in.html?failed=true");
        }
    }
    if(isset($_COOKIE['username'])){
        echo '<p>You are logged in!<p>';
    }
?>