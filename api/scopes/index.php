<?php
include(__DIR__ . "/../config.php");
if (isset($_GET['a']) AND isset($_GET['id']) AND isset($_GET['si'])){
    if ($_GET['a'] == "c") {
        $res = $PDO->query("UPDATE `scores` SET `status` = 2 , `accepter` = '" . $_GET['si'] . "' WHERE `id` = '" . $_GET['id'] . "'");
        if (!$res) {
            echo "false";
        } else {
            echo "true";
        }
    } else if ($_GET['a'] == "x") {
        $res = $PDO->query("UPDATE `scores` SET `status` = 0 , `accepter` = '" . $_GET['si'] . "' WHERE `id` = '" . $_GET['id'] . "'");
        if (!$res) {
            echo "false";
        } else {
            echo "true";
        }
    }
} else {
    echo "Bad request!";
}
?>