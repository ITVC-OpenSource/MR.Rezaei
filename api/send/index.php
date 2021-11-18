<?php
include(__DIR__ . "/../config.php");
if (isset($_GET['n']) AND isset($_GET['f']) AND isset($_GET['id']) AND isset($_GET['a'])) {
    $id = $_GET["id"];
    $f = $_GET['f'];
    $n = $_GET['n'];
    $quexe = $PDO->query("INSERT INTO `scores`(`sender_id`, `school`, `accepter`, `about`, `number`, `status`) VALUES ('" . $id . "' , '" . $_GET['s'] . "' , '" . $_GET['a'] . "' , '" . $f . "' , '" . $n . "' , 1)");
    if (!$quexe) {
        echo "false";
    }else{
        echo "true";
    }
}else {
    echo "Bad Request!";
}
?>