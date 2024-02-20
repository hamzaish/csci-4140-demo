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
        ob_start();
        $image = new Imagick('$file_name');
        $img= $image->getImageBlob();
        $contents = ob_get_contents();
        ob_end_clean();
        echo "<img src='data:image/jpg;base64,".base64_encode($contents)."' />";
    }
?>

</body>
</html>