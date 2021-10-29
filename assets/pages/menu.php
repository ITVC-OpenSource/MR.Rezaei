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
        <li class="nav-item">
          <a class="nav-link" href="/send/" dideo-checked="true">ارسال درخواست امتیاز</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/get/" dideo-checked="true">وضعیت درخواست ها</a>
        </li>
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
