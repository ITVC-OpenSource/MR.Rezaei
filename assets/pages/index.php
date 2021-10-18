<?php
include(__DIR__ . "/../php/config.php");
?>
<style media="screen">
button{
  font-size: 150%!important;
}
</style>
<body class="bg-light text-center">
  <?php include(__DIR__ . "/menu.php"); ?>
  <div class="container" style="position: absolute; top: 50%; left: 50%; transform: translate(-50% , -50%);">
    <button onclick="location.assign('/admin/');" class="btn bg-primary text-center text-light mb-1">پنل مدیریت</button><br>
    <button onclick="location.assign('/send/');" class="btn bg-primary text-center text-light mb-1">ارسال درخواست امتیاز</button><br>
    <button onclick="location.assign('/get/');" class="btn bg-primary text-center text-light mb-1">وضعیت درخواست ها</button><br>
  </div>
</body>
</html>
