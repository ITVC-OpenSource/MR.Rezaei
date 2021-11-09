<?php
include(__DIR__ . "/../config.php");
if (isset($_GET['type']) AND isset($_GET['txt']) AND isset($_GET['old'])) {
    if ($_GET['type'] == "uname") {
        $res = $PDO->query("UPDATE `users` SET `uname`= '" . $_GET['txt'] . "' WHERE `uname` = '" . $_GET['old'] . "'");
        if (!$res) {
            echo "false";
        }else {
            echo "true";
        }
    } else if ($_GET['type'] == "passw") {
        $res = $PDO->query("UPDATE `users` SET `passw`= '" . $_GET['txt'] . "' WHERE `passw` = '" . $_GET['old'] . "'");
        if (!$res) {
            echo "false";
        }else {
            echo "true";
        }
    }else {
        echo "Bad request!";
    }
} else {
    echo "Bad request!";
}
?>