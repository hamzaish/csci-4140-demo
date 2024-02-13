<?php
    $connect = include('db_connect.php');
?>

<!DOCTYPE html>
<html>
<body>
<?php
    if (isset($_POST["submit"])) {

        // Check image using getimagesize function and get size
        // if a valid number is got then uploaded file is an image
        if (isset($_FILES["image"])) {
            // directory name to store the uploaded image files
            // this should have sufficient read/write/execute permissions
            // if not already exists, please create it in the root of the
            // project folder
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($_FILES["image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            
            // Validation here
        }
    }
?>

<form action="" method="post" enctype="multipart/form-data">
  <input type="file" id="image" name="filename">
  <input type="submit" name="submit" value="Upload Photo">
</form>

</body>
</html>