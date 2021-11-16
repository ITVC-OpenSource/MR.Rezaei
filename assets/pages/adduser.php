<?php
if (!isset($direct)) {
  $direct = false;
}
include(__DIR__ . "/../php/config.php");
if (isset($_POST['sub'])) {
  $type = $_POST['type'];
  $name = $_POST['name'];
  $ncode = $_POST['ncode'];
  $uname = $_POST['uname'];
  $passw = $_POST['passw'];
  $school = $user_data['school'];
  $class = $_POST['class'];
  $res = $PDO->query("INSERT into `users` (`type`, `name`, `national_code`, `uname`, `passw` , `school` , `class`) VALUES ('$type', '$name', '$ncode','$uname','$passw' , '$school' , '$class')");
  if (!$res) {
    echo "Error";
  }
}
?>
<body class="text-center">
<?php
  include(__DIR__ . "/menu.php");
?>
<div class="main" style="width: 100%;z-index: -11111;">
  <div class="p-2">
    <img src="/favicon.ico" style="margin-bottom: 10px;" width="150px" height="150px">
    <form action="<?php echo $server; ?>/add_user/" method="post">
      <div class="form-floating mb-2">
        <select name="type" class="form-control" id="floatingInput">
          <option value="student">دانش آموز</option>
            <?php
                if ($user_data['type'] == "full_admin") {
                    ?><option value="admin">تأیید کننده</option><option value="admin">مدیر</option><?php
                }
            ?>
            <?php
            if ($user_data['type'] == "developer") {
                ?><option value="admin">تأیید کننده</option><option value="admin">مدیر</option><option value="full_admin">مدیرکل</option><?php
            }
            ?>
        </select>
        <label>نقش</label>
      </div>
      <div class="form-floating mb-2">
        <input name="name" autocomplete="off" dir="ltr" type="text" class="form-control" id="floatingInput">
        <label>نام و نام خانوادگی</label>
      </div>
        <div class="form-floating mb-2">
            <input name="uname" autocomplete="off" dir="ltr" type="text" class="form-control" id="floatingInput">
            <label>نام کاربری</label>
        </div>
        <div class="form-floating mb-2">
            <input name="passw" autocomplete="off" dir="ltr" type="text" class="form-control" id="floatingPassword">
            <label>گذرواژه</label>
        </div>
        <div class="form-floating mb-2">
            <select name="type" class="form-control mb-2" id="floatingInput">
                <?php
                $res = $PDO->query("SELECT * FROM `classes` WHERE school = '" . $user_data['school'] . "'");
                if ($res->rowCount() == 0) {
                    die("<option>هیچ کلاسی یافت نشد.</option>");
                } else {
                    foreach ($res as $cls) {
                        echo "<option value='" . $cls['code'] . "'>" . $cls['code'] . "</option>";
                    }
                }
                ?>
            </select>
            <label>کلاس</label>
        </div>
      <div class="form-floating mb-2">
        <input name="ncode" autocomplete="off" dir="ltr" type="text" class="form-control" id="floatingInput">
        <label>کدملی</label>
      </div>
        <br>
        <div class="form-floating mb-2">
          <button id="sub" type="submit" name="sub" class="w-100 btn btn-lg btn-primary">ایجاد کاربر</button>
        </div>
      </form>
      <p class="mt-5 mb-3 text-muted" dir="ltr">©1400</p>
    </div>
</div>
</body>
</html>
