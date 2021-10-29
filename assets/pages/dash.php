<?php
include(__DIR__ . "/dashfunc.php");
if (isset($_GET['action'])) {
    if ($_GET['action'] == "home") {
        home();
    } else if ($_GET['action'] == "delete_user") {
        delete_user();
    } else if ($_GET['action'] == "add_user") {
        add_user();
    } else if ($_GET['action'] == "edit_user") {
        edit_user();
    } else if ($_GET['action'] == "requests") {
        requests();
    }
} else {
    home();
}
?>