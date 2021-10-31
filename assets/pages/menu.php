<?php
include(__DIR__ . "/../php/config.php");
?>
<link rel="stylesheet" href="<?php echo $server; ?>/assets/css/menu.css">
<div class="desktop-menu bg-dark">
  <nav class="ds-menu d-xs-none d-lg-block navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid" style="direction: rtl;">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/" dideo-checked="true">خانه</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/" dideo-checked="true">داشبورد</a>
        </li>
      <?php
        if ($type == "admin" or $type == "full_admin" or $type == "developer" or $type == "school") {
          ?>
      <div class="d-sm-none admin-mobile-items">
      <li class="nav-item">
        <a id="requests" href="/dashboard/?action=requests" class="nav-link" dideo-checked="true">
          درخواست ها
        </a>
      </li>
      <li class="nav-item">
        <a id="add_user" href="/dashboard/?action=add_user" class="nav-link" dideo-checked="true">
          افزودن کاربر جدید
        </a>
      </li>
      <li class="nav-item">
        <a id="edit_user" href="/dashboard/?action=edit_user" class="nav-link" dideo-checked="true">
          ویرایش اطلاعات کاربران
        </a>
      </li>
      <li class="nav-item">
        <a id="delete_user" href="/dashboard/?action=delete_user" class="nav-link" dideo-checked="true">
          حذف کاربر
        </a>
      </li>
</div>
<?php
        }else {?>
          <div class="d-sm-none std-mobile-menu">
          <li class="nav-item">
            <a id="send" href="/dashboard/?action=send" class="nav-link" dideo-checked="true">
            ارسال درخواست
            </a>
          </li>
          <li class="nav-item">
            <a id="get" href="/dashboard/?action=requests" class="nav-link" dideo-checked="true">
            درخواست ها
            </a>
          </li>
          </div>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link" href="/about/" dideo-checked="true">درباره</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</div>
<script>
document.querySelectorAll(".nav-link").forEach(element => {
  if (element.href === location.href) {
    $(element).addClass("active");
  }else{
    $(element).removeClass("active");
  }
});
</script>
