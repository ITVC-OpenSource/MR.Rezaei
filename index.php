<?php
include(__DIR__ . "/assets/php/router.php");
ROUTE::get("/" , function () {
    include(__DIR__ . "/assets/pages/index.php");
});
ROUTE::get("/login/" , function () {
    include(__DIR__ . "/assets/pages/login.php");
});
ROUTE::get("/dashboard/" , function () {
    include(__DIR__ . "/assets/pages/dashboard.php");
});
ROUTE::get("/logout/" , function () {
    include(__DIR__ . "/assets/pages/logout.php");
});
ROUTE::get("/about/" , function () {
    include(__DIR__ . "/assets/pages/about.php");
});
ROUTE::get("/add_user/" , function () {
    $direct = true;
    include(__DIR__ . "/assets/pages/adduser.php");
});
ROUTE::post("/add_user/" , function () {
    include(__DIR__ . "/assets/pages/adduser.php");
});
ROUTE::get("/delete_user/" , function () {
    include(__DIR__ . "/assets/pages/deleteuser.php");
});
ROUTE::get("/user_profile/" , function () {
    $direct = true;
    include(__DIR__ . "/assets/pages/profile.php");
});
$ro = ["login" , "dashboard" , "logout" , "about" , "add_user" , "user_profile", "delete_user"];
$rt = [];
$rs = [];
$encoded_url = ROUTE::findURI();
$r = [];
foreach ($ro as $rout) {
    if ($encoded_url[0] == $rout) {
        $r["true"] = "true";
    }else {
        $r["false"] = "false";
    }
}
foreach ($rt as $rout) {
    if ($encoded_url[0] == $rout) {
        $r["true"] = "true";
    }else {
        $r["false"] = "false";
    }
}
foreach ($rs as $rout) {
    if ($encoded_url[0] == $rout) {
        $r["true"] = "true";
    }else {
        $r["false"] = "false";
    }
}
if (in_array("true" , $r) == 0) {
    include(__DIR__ . "/assets/pages/404.php");
}
?>