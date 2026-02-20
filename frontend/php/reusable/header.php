<?php
include_once(__DIR__ . '/../../../backend/base_url.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Header</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid" style="width: 30%;">
            <a class="navbar-brand" href="<?php echo BASE_URL ?>start.php">Kvack</a>
        </div>
        <div style="width: 40%;">
            <form class="d-flex" role="search" method="get" action="<?php echo BASE_URL ?>start.php">
                <input class="form-control" name="search" type="search" placeholder="Search" aria-label="Search" />
            </form>
        </div>
        <div style="width: 30%;">

        </div>
    </nav>
</body>