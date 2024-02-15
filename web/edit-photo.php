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
        $folder = "images/";
        $target = $folder.$file_name;
        move_uploaded_file($temp_name, $target);
        echo "<img src = $target>";
        echo "<p>$file_name<p>";
    }
?>

</body>
</html>