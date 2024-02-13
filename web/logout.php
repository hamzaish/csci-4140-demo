<?php
    include('db_connect.php');
    if(isset($_COOKIE['username'])){
        echo '<p>You are logged in!<p>';
    }
    header("Location: index.php")
?>