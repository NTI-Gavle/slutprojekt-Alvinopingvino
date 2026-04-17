<?php
include('db_connect.php');

if (!isset($_FILES['image'])) {
    die('No file uploaded!');
}

$allowed = ["jpg", "jpeg", "png"];
$file = $_FILES['image'];

$tmp = $file['tmp_name'];
$error = $file['error'];
$type = mime_content_type($tmp);
$ext = strtolower(explode('/', $type)[1]);

if (!in_array($ext, $allowed) || $error !== 0) {
    die('Only accept types: jpg, jpeg, png and gif');
}

$newName = uniqid("img_", true) . "." . $ext;
move_uploaded_file($tmp, "uploads/" . $newName);

echo(json_encode([
    'path' => $newName
]));