<?php
include(__DIR__ . "/../config.php");
if (isset($_GET['id'])) {
    $res = $PDO->query("DELETE FROM `scores` WHERE `id` = '" . $_GET['id'] . "'");
    if (!$res) {
        echo "false";
    } else {
        echo "true";
    }
} else {
    echo "Bad request!";
}