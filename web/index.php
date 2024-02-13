<?php
          $connect = include('db_connect.php');
        ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Photo Editing Server</title>
  </head>
  <body>
    <link rel="stylesheet" href="./style.css" />
    <div>
      <link href="./index.css" rel="stylesheet" />
      <div class="home-container">
      <p class="home-text">Log In to View Photos</p>
      <form id="login" name="login" method="post" action="login.php">
        <input
          type="text"
          placeholder="Username"
          name="username"
          class="home-textinput input"
        />
        <input
          type="text"
          placeholder="Password"
          name="password"
          class="home-textinput1 input"
        />
        <button type="submit" class="home-button button">Log In</button>
      </form>
      </div>
    </div>
  </body>
</html>
