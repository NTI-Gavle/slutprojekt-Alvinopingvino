<?php
include('db_connect.php');

if (!isset($_FILES['image'])) {
    die('No file uploaded!');
}

$allowed = ["jpeg", "png", "webp"];
$file = $_FILES['image'];

$tmp = $file['tmp_name'];
$error = $file['error'];
$type = mime_content_type($tmp);

if (($error !== 0) || !array_filter($allowed, fn($a) => str_contains($type, $a))) 
{
    echo(json_encode([
        'error' => 'Only accept types: jpg, jpeg, png and webp'
    ]));
    die();
}

if (str_contains($type, 'jpeg')) {
    $ext = 'jpg';
} elseif (str_contains($type, 'png')) {
    $ext = 'png';
} elseif (str_contains($type, 'webp')) {
    $ext = 'webp';
}

$newName = uniqid("img_", true) . "." . $ext;
move_uploaded_file($tmp, "uploads/" . $newName);

echo(json_encode([
    'path' => $newName
]));