<?php
$uploadDir = __DIR__ . "/uploads/";
require_once('db_connect.php');
if (!isset($_SESSION)) {
    session_start();
}

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

$message = "";
$uploadedImage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {

        $tmp = $_FILES["image"]["tmp_name"];
        $ext = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

        $allowed = ["jpg", "jpeg", "png", "gif"];

        if (!in_array($ext, $allowed)) {
            $message = "Only images allowed.";
        } elseif (!getimagesize($tmp)) {
            $message = "Not a valid image.";
        } else {

            switch ($ext) {
                case "jpg":
                case "jpeg":
                    $src = imagecreatefromjpeg($tmp);
                    break;
                case "png":
                    $src = imagecreatefrompng($tmp);
                    break;
                case "gif":
                    $src = imagecreatefromgif($tmp);
                    break;
            }

            $width = imagesx($src);
            $height = imagesy($src);

            $size = min($width, $height);

            $x = (int)(($width - $size) / 2);
            $y = (int)(($height - $size) / 2);

            $newSize = 300;
            $dst = imagecreatetruecolor($newSize, $newSize);

            imagecopyresampled(
                $dst, $src,
                0, 0,
                $x, $y,
                $newSize, $newSize,
                $size, $size
            );

            $newName = uniqid("img_", true) . ".jpg";
            $path = $uploadDir . $newName;

            imagejpeg($dst, $path, 90);

            imagedestroy($src);
            imagedestroy($dst);

            $message = "Image cropped to square!";
            $uploadedImage = $path;

            $stmt = $dbconn -> query('SELECT profile_pic FROM users WHERE id = ' . $_SESSION['user_id']);
            $pfp = $stmt -> fetch(PDO::FETCH_ASSOC);
            if ($pfp['profile_pic'] != "default_pfp.jpg"){
                unlink('uploads/' . $pfp['profile_pic']);
            }
            $dbconn -> query("UPDATE users SET profile_pic = '$newName' WHERE id = " . $_SESSION['user_id']);
        }
    }
}

header('location: ../frontend/php/settings.php');
?>