<?php
    $connect = include('db_connect.php');
?>
<!DOCTYPE html>
<html>
<body>
<?php
    define ('SITE_ROOT', realpath(dirname(__FILE__)));
    if (isset($_POST["submit"])) {
        define("public", $_POST["public"]);
        $file_name = $_FILES["image"]["name"];
        $temp_name = $_FILES["image"]["tmp_name"];
        $folder = SITE_ROOT."/";
        $target = $folder.$file_name;
        move_uploaded_file($temp_name, $target);
        $image = new Imagick($target);
        $image->resizeImage(300, 300, Imagick::FILTER_LANCZOS,1);
        $image->setImageFormat("jpg");
        ob_start();
        print$image->getImageBlob();
        $contents = ob_get_contents();
        ob_end_clean();
        echo "<img src='data:image/jpg;base64,".base64_encode($contents)."' />";
    }
?>
<form action="" method="post">
    <input type="submit" name="filter1" value="Filter 1">
    <input type="submit" name="filter2" value="Filter 2">
</form>


</body>
</html>