<?php
include(__DIR__ . "/../php/config.php");
function home() {
    echo "<script>$('#home').addClass('active');</script>";
}
function add_user() {
    include(__DIR__ . "/adduser.php");
    echo "<script>$('#add_user').addClass('active');$('body').addClass('text-center');</script>";
}
function edit_user() {
    include(__DIR__ . "/edituser.php");
    echo "<script>$('#edit_user').addClass('active');</script>";
}
function requests() {
    include(__DIR__ . "/get.php");
    echo "<script>$('#requests').addClass('active');</script>";
}
function profile() {
    include(__DIR__ . "/profile.php");
}
function delete_user() {
    echo "<script>$('#delete_user').addClass('active');</script>";
    include(__DIR__ . "/deleteuser.php");
}
function add_user_with_file() {
    echo "<script>$('#add_user_with_file').addClass('active');</script>";
    include(__DIR__ . "/adduserwithfile.php");
}
?>