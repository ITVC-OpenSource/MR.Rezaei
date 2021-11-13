<?php include(__DIR__ . "/../php/config.php"); ?>
<p>
    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Link with href
    </a>
</p>
<div class="collapse" id="collapseExample">
    <div class="card card-body">
        Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
    </div>
</div>

<li class="nav-item">
    <a class="nav-link text-white" type="button" data-bs-toggle="collapse" data-bs-target="#edit_users_collapse" aria-expanded="false" aria-controls="edit_users_collapse">
        <i class="bi bi-caret-left-fill">  </i>ویرایش کاربران
    </a>
    <div class="collapse" id="edit_users_collapse">
        <ul class="nav" style="margin-right: 1rem;">
            <li class="nav-item">
                <a id="home" href="/dashboard/?action=home" class="nav-link text-white home" aria-current="page" dideo-checked="true">
                    <i class="bi bi-house-door-fill">  </i>ویرایش مدیران
                </a>
            </li>
            <li class="nav-item">
                <a id="requests" href="/dashboard/?action=requests" class="nav-link text-white requests" dideo-checked="true">
                    <i class="bi bi-person-lines-fill">  </i>ویرایش دانش آموزان
                </a>
            </li>
        </ul>
    </div>
</li>