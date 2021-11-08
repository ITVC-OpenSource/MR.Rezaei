<?php
include(__DIR__ . "/../config.php");
if (isset($_GET['id']) AND isset($_GET['uname']) AND isset($_GET['passw']) AND isset($_GET['national_code']) AND isset($_GET['class']) AND isset($_GET['status']) AND isset($_GET['type']) AND isset($_GET['name'])) {
    $res = $PDO->query("UPDATE `users` SET `name`='" . $_GET['name'] . "',`uname`='" . $_GET['uname'] . "',`passw`='" . $_GET['passw'] . "',`national_code`='" . $_GET['national_code'] . "',`class`='" . $_GET['class'] . "',`status`='" . $_GET['status'] . "',`type`='" . $_GET['type'] . "' WHERE id = '" . $_GET['id'] . "'");
    if (!$res) {
        echo "false";
    } else {
        echo "true";
    }
} else {
    echo "Bad request!";
}
?>