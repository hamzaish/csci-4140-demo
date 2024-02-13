<?php
    include('db_connect.php');
    if(isset($_COOKIE['username'])){
        setcookie('name', '', time()-3600)
        header("Location: index.php");
    }
?>