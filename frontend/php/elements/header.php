<?php
include_once(__DIR__ . '/../../../backend/base_url.php');
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary" style="border-bottom: 1px solid lightgray;">
        <div class="container-fluid" style="width: 30%;">
            <a class="navbar-brand" href="<?php echo(BASE_URL) ?>frontend/php/start.php">Kvack</a>
        </div>
        <div style="width: 40%;">
            <form class="d-flex" role="search" method="get" action="<?php echo(BASE_URL) ?>frontend/php/start.php">
                <input class="form-control" name="search" type="search" placeholder="Search in posts" aria-label="Search" />
            </form>
        </div>
        <div style="width: 30%;">

        </div>
    </nav>
</body>