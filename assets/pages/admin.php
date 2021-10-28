<?php
  include(__DIR__ . "/../php/config.php");
  if ($user_data['type'] == "مدیر" || $user_data['type'] == "مدیرکل") {?>
<div class="main">
  Hello!
</div>
<?php
}else{
?>
<div class="container">
  GoodBye!
</div>
<?php
}
?>
