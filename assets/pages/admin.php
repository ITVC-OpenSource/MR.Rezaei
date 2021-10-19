<?php
  include(__DIR__ . "/../php/config.php");
  if ($user_data['type'] == "admin" || $user_data['type'] == "full_admin") {?>
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
