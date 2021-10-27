<?php
include(__DIR__ . "/assets/php/router.php");
ROUTE::get("/" , function () {
    include(__DIR__ . "/assets/pages/index.php");
});
ROUTE::get("/login/" , function () {
    include(__DIR__ . "/assets/pages/login.php");
});
ROUTE::get("/send/" , function () {
    include(__DIR__ . "/assets/pages/send.php");
});
ROUTE::get("/get/" , function () {
    include(__DIR__ . "/assets/pages/get.php");
});
ROUTE::get("/dashboard/" , function () {
    include(__DIR__ . "/assets/pages/dashboard.php");
});
ROUTE::get("/admin/" , function () {
    include(__DIR__ . "/assets/pages/admin.php");
});
ROUTE::get("/logout/" , function () {
    include(__DIR__ . "/assets/pages/logout.php");
});
ROUTE::get("/about/" , function () {
    include(__DIR__ . "/assets/pages/about.php");
});
ROUTE::get("/add_user/" , function () {
    include(__DIR__ . "/assets/pages/adduser.php");
});
?>
