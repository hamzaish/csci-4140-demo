<?php
    $connect = include('db_connect.php');
?>

<!DOCTYPE html>
<html>
<body>
<?php
    if (isset($_POST["submit"])) {
        $file_name = $_FILES["image"]["name"];
        $temp_name = $_FILES["image"]["tmp_name"];
        $folder = "images/$file_name";
        move_uploaded_file($temp_name, $folder);
        echo "<img src = $folder>";
        echo "<p>$file_name<p>";
    }
?>

</body>
</html>