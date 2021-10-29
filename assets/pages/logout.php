<?php
include(__DIR__ . "/../php/config.php");
unset($_COOKIE['uname']);
unset($_COOKIE['passw']);
?>
<script>
setCookie("uname" , "out" , 3000);
setCookie("passw" , "out" , 3000);
document.cookie = '';
$_COOKIE["uname"] = undefined;
$_COOKIE["passw"] = undefined;
location.assign("/login/");
</script>
