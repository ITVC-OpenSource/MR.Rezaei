<div class="d-md-flex d-flex flex-column flex-shrink-0 p-3 text-white bg-dark css-sidebar" style="width: 280px;height: calc(100vh - 65px);border-radius: 15px;text-align: right;margin-right: 5px;">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">منو</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a id="std_home" href="/dashboard/?action=home" class="nav-link text-white">
                <i class="bi bi-house-door-fill">  </i>خانه
            </a>
        </li>
        <li class="nav-item">
            <a id="std_get" href="/dashboard/?action=requests" class="nav-link text-white">
                <i class="bi bi-person-lines-fill">  </i>درخواست ها
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="/favicon.ico" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong><?php echo $user_data["name"]; ?>(<?php echo $type; ?>)</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="/dashboard/?action=profile" dideo-checked="true">پروفایل</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/logout/" dideo-checked="true">خروج</a></li>
        </ul>
    </div>
</div>


<?php
include(__DIR__ . "/accepter_dashfunc.php");
?>
<div class="dash-div p-1">
    <?php
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "home") {
            home();
        } else if ($_GET['action'] == "requests") {
            requests();
        } else if ($_GET['action'] == "profile") {
            profile();
        }
    } else {
        home();
    }
    ?>
</div>
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
