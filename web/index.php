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
        <input
          type="text"
          placeholder="Username"
          name="password"
          class="home-textinput input"
        />
        <input
          type="text"
          placeholder="Password"
          name="username"
          class="home-textinput1 input"
        />
        <button type="submit" class="home-button button">Log In</button>
        <p class="home-text">Log In to View Photos</p>
        <?php
          echo '<h1>Hello world!</h1>';
          echo '<p>This page uses PHP version '
              . phpversion()
              . '.</p>';
          include('db_connect.php');
        ?>
      </div>
    </div>
  </body>
</html>
