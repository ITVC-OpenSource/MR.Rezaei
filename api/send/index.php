<?php
header("Access-Control-Allow-Origin: *");
include(__DIR__ . "/../config.php");
if (isset($_GET['n']) AND isset($_GET['f']) AND isset($_GET['s'])) {
    $n = $_GET['n'];
    $f = $_GET['f'];
    $p = $_GET['p'];
    $sg = $_GET['s'];
    if (isset($p) AND isset($sg) {
      $user_query = "SELECT * FROM users WHERE uname = $s AND passw = $p";
      $user_quexe = $PDO->query($user_query);
      if ($user_quexe->rowCount() == 1) {
        $user_data = $user_quexe->fetch(PDO::FETCH_ASSOC);
      }else{
        echo "<script>
          if (location.href === '" . $server . "/login/' || location.href === '" . $server . "/login' ) {
            // code...
          }else{
            location.assign('" . $server . "/login/');
          }
        </script>";
      }
    } else {
      echo "<script>
        if (location.href === '" . $server . "/login/' || location.href === '" . $server . "/login' ) {
          // code...
        }else{
          location.assign('" . $server . "/login/');
        }
      </script>";
    }
    $s = $user_data["id"];
    $quexe = $PDO->query("INSERT INTO `scores`(`sender_id`, `about`, `number`, `status`) VALUES ('" . $s . "','" . $f . "','" . $n . "',1)");
    if (!$quexe) {
        echo "false";
    }else{
        echo "true";
    }
}else {
    echo "Bad Request!";
}
?>