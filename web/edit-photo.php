<?php
    $connect = include('db_connect.php');
?>

<!DOCTYPE html>
<html>
<body>
<?php
    define ('SITE_ROOT', realpath(dirname(__FILE__)));
    if (isset($_POST["submit"])) {
        $file_name = $_FILES["image"]["name"];
        $temp_name = $_FILES["image"]["tmp_name"];
        $folder = SITE_ROOT."/";
        $target = $folder.$file_name;
        move_uploaded_file($temp_name, $target);
        echo "<img src='$file_name'";
        echo "<p>$target<p>";
        $image = new Imagick($file_name);
        header("Content-type: image/jpg");
        $img= $image->getImageBlob();
        echo $img;
    }
?>

</body>
</html>