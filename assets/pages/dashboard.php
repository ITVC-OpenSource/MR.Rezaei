<?php
  include(__DIR__ . "/../php/config.php");
  include(__DIR__ . "/menu.php");
?>

<?php
  if ($user_data['type'] == "admin" || $user_data['type'] == "full_admin" || $user_data['type'] == "developer") {?>
    <div class="main text-seconadry">
        <?php
            include(__DIR__ . "/admin_sidebar.php");
        ?>
    <div class="dash-div py-1 px-1">
      <?php
        include(__DIR__ . "/dash.php");
      ?>
    </div>
    </div>
<?php
}else{
?>
<div class="main">
<?php include(__DIR__ . "/std_sidebar.php"); ?>
</div>
<?php
}
?>
