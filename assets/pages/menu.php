<link rel="stylesheet" href="<?php echo $server; ?>/assets/css/menu.css">
<div class="mobile-menu">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
      <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none" dideo-checked="true">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">منو</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" class="nav-link active" aria-current="page" dideo-checked="true">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
          داشبورد
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white" dideo-checked="true">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          ارسال درخواست
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white" dideo-checked="true">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          وضعیت درخواست ها
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false" dideo-checked="true">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong><?php echo $_data['name']; ?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="/settings/" dideo-checked="true">تنظیمات</a></li>
        <li><a class="dropdown-item" href="/profile/" dideo-checked="true">پروفایل</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="/logout/" dideo-checked="true">خروج</a></li>
      </ul>
    </div>
  </div>
</div>
</div>

<div class="desktop-menu bg-dark">
  <nav class="d-md-none d-xs-none d-lg-block navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid" style="direction: rtl;">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/" dideo-checked="true">خانه</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="search" dideo-checked="true">جست وجو</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add" dideo-checked="true">افزودن پست</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="activity" dideo-checked="true">فعالیت</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="settings" dideo-checked="true">تنظیمات</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

</div>
<script>
/* global bootstrap: false */
(function () {
  'use strict'
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  tooltipTriggerList.forEach(function (tooltipTriggerEl) {
    new bootstrap.Tooltip(tooltipTriggerEl)
  })
})()
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

if (screen.availWidth < 768) {
  $(".desktop-menu").hide();
  $(".mobile-menu").show();
} else {
  $(".mobile-menu").hide();
  $(".desktop-menu").show();
}

window.onresize = () => {
  if (screen.availWidth < 768) {
    $(".desktop-menu").hide();
    $(".mobile-menu").show();
  } else {
    $(".mobile-menu").hide();
    $(".desktop-menu").show();
  }
}
</script>
