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
<div style="text-align: center;" class="four-sado-four-container container">
  <h1 style="color: crimson;font-size: 500;margin: 0;">404</h1>
  <h3 style="color: crimson;font-size: 50;">You can't get this folder from this server!</h3>
</div>
