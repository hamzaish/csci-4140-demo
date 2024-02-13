<?php
    $connect = include('db_connect.php');
?>

<!DOCTYPE html>
<html>
<body>

<p>Click on the "Choose File" button to upload a file:</p>

<form action="edit-photo.php">
  <input type="file" id="myFile" name="filename">
  <input type="submit">
</form>

</body>
</html>