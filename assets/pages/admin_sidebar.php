<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;height: calc(100vh - 65px);">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none" dideo-checked="true">
      <span class="fs-4">منو</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/dashboard/?action=home" class="nav-link text-white" aria-current="page" dideo-checked="true">
          خانه
        </a>
      </li>
      <li>
        <a href="/dashboard/?action=delete_user" class="nav-link text-white" dideo-checked="true">
          حذف کاربر
        </a>
      </li>
      <li>
        <a href="/dashboard/?action=requests" class="nav-link text-white" dideo-checked="true">
          درخواست ها
        </a>
      </li>
      <li>
        <a href="/dashboard/?action=add_user" class="nav-link text-white" dideo-checked="true">
          افزودن کاربر جدید
        </a>
      </li>
      <li>
        <a href="/dashboard/?action=edit_user" class="nav-link text-white" dideo-checked="true">
          ویرایش اطلاعات کاربران
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false" dideo-checked="true">
        <img src="/favicon.ico" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong><?php echo $user_data["name"]; ?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="/dashboard/?action=settings" dideo-checked="true">تنظیمات سیستم</a></li>
        <li><a class="dropdown-item" href="/dashboard/?action=profile" dideo-checked="true">پروفایل</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="/logout/" dideo-checked="true">خروج</a></li>
      </ul>
    </div>
  </div>



<script>
  document.querySelectorAll(".nav-link").forEach((c) => {
    if (c.href === location.pathname + location.search) {
      $(c).addClass("active");
    }
  });
</script>


  <style media="screen">
  body {
    min-height: 100vh;
    min-height: -webkit-fill-available;
  }

  html {
    height: -webkit-fill-available;
  }

  main {
    display: flex;
    flex-wrap: nowrap;
    height: 100vh;
    height: -webkit-fill-available;
    max-height: 100vh;
    overflow-x: auto;
    overflow-y: hidden;
  }

  .b-example-divider {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
  }

  .bi {
    vertical-align: -.125em;
    pointer-events: none;
    fill: currentColor;
  }

  .dropdown-toggle { outline: 0; }

  .nav-flush .nav-link {
    border-radius: 0;
  }

  .btn-toggle {
    display: inline-flex;
    align-items: center;
    padding: .25rem .5rem;
    font-weight: 600;
    color: rgba(0, 0, 0, .65);
    background-color: transparent;
    border: 0;
  }
  .btn-toggle:hover,
  .btn-toggle:focus {
    color: rgba(0, 0, 0, .85);
    background-color: #d2f4ea;
  }

  .btn-toggle::before {
    width: 1.25em;
    line-height: 0;
    content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%280,0,0,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
    transition: transform .35s ease;
    transform-origin: .5em 50%;
  }

  .btn-toggle[aria-expanded="true"] {
    color: rgba(0, 0, 0, .85);
  }
  .btn-toggle[aria-expanded="true"]::before {
    transform: rotate(90deg);
  }

  .btn-toggle-nav a {
    display: inline-flex;
    padding: .1875rem .5rem;
    margin-top: .125rem;
    margin-left: 1.25rem;
    text-decoration: none;
  }
  .btn-toggle-nav a:hover,
  .btn-toggle-nav a:focus {
    background-color: #d2f4ea;
  }

  .scrollarea {
    overflow-y: auto;
  }

  .fw-semibold { font-weight: 600; }
  .lh-tight { line-height: 1.25; }
  </style>
