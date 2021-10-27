<?php
include(__DIR__ . "/../php/config.php");
unset($_COOKIE['uname']);
unset($_COOKIE['passw']);
?>
<script>
location.assign("/login/");
</script>
