<?php
unset($_COOKIE['uname']);
unset($_COOKIE['passw']);
?>
<script>
localStorage.removeItem("uname");
localStorage.removeItem("passw");
</script>
