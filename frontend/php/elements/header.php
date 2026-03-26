<?php
include_once(__DIR__ . '/../../../backend/base_url.php');
?>

<nav class="bg-body-tertiary d-flex" style="border-bottom: 1px solid lightgray;">
        <div class="left d-flex justify-content-center align-items-center" style="border: none;">
            <h5 class="font-weight-bold mb-0">Kvack</h5>
        </div>
        <div class="my-1 mx-auto" style="width: 60%;">
            <form class="d-flex justify-content-center" role="search" method="get" action="<?php echo(BASE_URL) ?>frontend/php/start.php">
                <input class="form-control" style="max-width: 500px;" name="search" type="search" placeholder="Search in posts" aria-label="Search" />
            </form>
        </div>
        <div class="right">

        </div>
    </nav>
</body>