<?php
include(__DIR__ . "/../php/config.php");
?>
<script>
setCookie("uname" , "out" , 1);
setCookie("passw" , "out" , 1);
location.assign("/login/");
</script>
