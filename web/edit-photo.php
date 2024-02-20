<?php
    $connect = include('db_connect.php');
?>
<!DOCTYPE html>
<html>
<body>
<?php
    define ('SITE_ROOT', realpath(dirname(__FILE__)));
    $filter = "none";
    if (isset($_POST["submit"])) {
        $public = $_POST["public"];
        $file_name = $_FILES["image"]["name"];
        $temp_name = $_FILES["image"]["tmp_name"];
        $folder = SITE_ROOT."/";
        $target = $folder."image.jpg";
        move_uploaded_file($temp_name, $target);
        define("target", $target);
        $image = new Imagick($target);
        $image->resizeImage(300, 300, Imagick::FILTER_LANCZOS,1);
        $image->setImageFormat("jpg");
        ob_start();
        print$image->getImageBlob();
        $contents = ob_get_contents();
        ob_end_clean();
        define("contents", $contents);
        echo "<img src='data:image/jpg;base64,".base64_encode(contents)."' />";
    }
    if (isset($_POST["filter1"])) {
        $folder = SITE_ROOT."/";
        $target = $folder."image.jpg";
        $image = new Imagick($target);
        $image->resizeImage(298, 298, Imagick::FILTER_LANCZOS,1);
        $image->setImageFormat("jpg");
        $image->borderImage("black", 2, 2);
        ob_start();
        print$image->getImageBlob();
        $contents = ob_get_contents();
        ob_end_clean();
        define("contents", $contents);
        $filter = "filter1";
        echo "<img src='data:image/jpg;base64,".base64_encode(contents)."' />";
    }
    if (isset($_POST["filter2"])) {
        $folder = SITE_ROOT."/";
        $target = $folder."image.jpg";
        $image = new Imagick($target);
        $image->resizeImage(300, 300, Imagick::FILTER_LANCZOS,1);
        $image->setImageFormat("jpg");
        $image->setImageType(Imagick::IMGTYPE_GRAYSCALEMATTE);
        ob_start();
        print$image->getImageBlob();
        $contents = ob_get_contents();
        ob_end_clean();
        define("contents", $contents);
        $filter = "filter2";
        echo "<img src='data:image/jpg;base64,".base64_encode(contents)."' />";
    }
    if (isset($_POST["discard"])) {
        $folder = SITE_ROOT."/";
        $target = $folder."image.jpg";
        unlink($target);
        echo '<meta http-equiv="Location" content="photos.php">';
    }
    if (isset($_POST["upload"])) {
        if ($filter == "none"){
            $folder = SITE_ROOT."/";
            $target = $folder."image.jpg";
            $name = $_COOKIE['username'];
            $data = file_get_contents($target);
            $sql = "INSERT INTO images (name, public, img) VALUES ($name, $public, $data)";
            $result = $conn->query($sql);
            echo '<meta http-equiv="Location" content="photos.php">';
        }
    }
?>
<form action="" method="post">
    <input type="submit" name="filter1" value="Filter 1">
    <input type="submit" name="filter2" value="Filter 2">
    <input type="submit" name="discard" value="Discard">
    <input type="submit" name="upload" value="Upload">
</form>


</body>
</html>