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
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($_FILES["image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                echo "<p>The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.<p>";
            } else {
                echo "<p>Sorry, there was an error uploading your file.<p>";
            }
            // Validation here
        }
    }
?>

</body>
</html>