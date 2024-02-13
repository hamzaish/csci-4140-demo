<?php
    include('db_connect.php');
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $pass = $_POST['password'];
        setcookie('username', $username, time()+3600);
        $sql = "SELECT FROM myusers WHERE name='$username' AND passwords='$pass'";
        $result = $conn->query($sql);
        $rows = pg_num_rows($result);
        if($rows == 1){
            header("Location: https://www.postgresql.org/docs/current/tutorial-accessdb.html", true, 301);
        }
        else{
            header("Location: https://www.postgresql.org", true, 301);
        }
    }
    if(isset($_COOKIE['username'])){
        echo '<p>You are logged in!<p>';
    }
?>