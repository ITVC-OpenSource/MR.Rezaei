<?php
function home() {
    echo "<script>$('#home').addClass('active');</script>";
    include(__DIR__ . "/index.php");
}
function add_user() {
    include(__DIR__ . "/adduser.php");
}
?>