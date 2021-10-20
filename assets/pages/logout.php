<?php
include(__DIR__ . "/../php/config.php");
unset($_COOKIE['uname']);
unset($_COOKIE['passw']);
?>
<script>
if ($_COOKIE["uname"] !==undefined || $_COOKIE["passw"] !==undefined) {
    location.reload();
} else {
    location.assign("/login/");
}
</script>
