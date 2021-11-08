<?php
include(__DIR__ . "/../php/config.php");
function home() {
    echo "<script>document.querySelector('.home').classList.add('active');</script>";
}
function add_user() {
    include(__DIR__ . "/adduser.php");
    echo "<script>document.querySelector('.add_user').classList.add('active');$('body').addClass('text-center');</script>";
}
function edit_user() {
    include(__DIR__ . "/edituser.php");
    echo "<script>document.querySelector('.edit_user').classList.add('active');</script>";
}
function requests() {
    include(__DIR__ . "/get.php");
    echo "<script>document.querySelector('.requests').classList.add('active');</script>";
}
function profile() {
    include(__DIR__ . "/profile.php");
}
function delete_user() {
    include(__DIR__ . "/deleteuser.php");
    echo "<script>document.querySelector('.delete_user').classList.add('active');</script>";
}
function add_user_with_file() {
    include(__DIR__ . "/adduserwithfile.php");
    echo "<script>document.querySelector('.add_user_with_file').classList.add('active');</script>";
}
?>