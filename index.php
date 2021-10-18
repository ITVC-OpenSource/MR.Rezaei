<?php
include(__DIR__ . "/assets/php/router.php");
ROUTE::get("/" , function () {
    include(__DIR__ . "/assets/pages/index.php");
});
ROUTE::get("/login/" , function () {
    include(__DIR__ . "/assets/pages/login.php");
});
ROUTE::get("/home/" , function () {
    include(__DIR__ . "/assets/pages/home.php");
});
?>
<div class="four-sado-four-container container">
<h1 style="color: crimson;">404</h1>
</div>
