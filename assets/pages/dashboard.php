<?php
  include(__DIR__ . "/../php/config.php");
  include(__DIR__ . "/menu.php");
?>

<?php
  if ($user_data['type'] == "admin" || $user_data['type'] == "full_admin") {?>
    <div class="main text-center text-seconadry">
    <?php
      include(__DIR__ . "/admin_sidebar.php");
    ?>
    <div class="dash-div">
      <?php
        include(__DIR__ . "/dash.php");
      ?>
    </div>
    </div>
<?php
}else{
?>
<div class="container">
<?php include(__DIR__ . "/std_sidebar.php"); ?>
  شما مجوز دسترسی به این صفحه را ندارید.
</div>
<?php
}
?>
