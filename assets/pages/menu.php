<style>
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

/* Style tab links */
.tablink {
  background-color: #212529;
  color: white;
  float: right;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: 25%;
}

.tablink:hover {
  background-color: #777;
}

.tablink.active{
  background-color: rgba(255 , 255 , 255 , 0.5);
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  display: none;
}
</style>
<div class="desktop-menu">
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

<div class="mobile-menu bg-dark">
  <button class="tablink" onclick="openPage('home', this)" id="defaultOpen">خانه</button>
  <button class="tablink" onclick="openPage('admin', this)">پنل مدیریت</button>
  <button class="tablink" onclick="openPage('send', this)">ارسال درخواست امتیاز</button>
  <button class="tablink" onclick="openPage('get', this)">وضعیت درخواست ها</button>

  <div id="home" class="tabcontent">
    <iframe src="/home/" frameborder="0" style="width: calc(100% - 1px);height: calc(100% - 25px);"></iframe>
  </div>

  <div id="send" class="tabcontent">
    <iframe src="/send/" frameborder="0" style="width: calc(100% - 1px);height: calc(100% - 25px);"></iframe>
  </div>

  <div id="get" class="tabcontent">
    <iframe src="/get/" frameborder="0" style="width: calc(100% - 1px);height: calc(100% - 25px);"></iframe>
  </div>

  <div id="admin" class="tabcontent">
    <iframe src="/admin/" frameborder="0" style="width: calc(100% - 1px);height: calc(100% - 25px);"></iframe>
  </div>
</div>
<script>
  function openPage(pageName, elmnt) {
  // Hide all elements with class="tabcontent" by default */
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Remove the background color of all tablinks/buttons
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
    tablinks[i].style.borderBottom = "2.5px solid #212529";
    $(tablinks[i]).removeClass("active");
  }

  // Show the specific tab content
  document.getElementById(pageName).style.display = "block";
  elmnt.style.borderBottom = "2.5px solid #212529";
  $(elmnt).addClass('active');
}

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