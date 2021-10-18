<?php
header("Access-Control-Allow-Origin: *");
include(__DIR__ . "/../config.php");
if (isset($_GET['u']) AND isset($_GET['p'])) {
    $u = $_GET['u'];
    $p = $_GET['p'];
    $res = $PDO->query("SELECT * FROM users WHERE uname = '$u' AND passw = '$p'");
    if ($res->rowCount() == 0) {
        echo "false";
    }else {
        echo "true";
    }
}else {
    echo "Bad Request!";
}
?>