<?php
include(__DIR__ . "/../php/config.php");
function sub()
{
  $type = $_POST['type'];
  $name = $_POST['name'];
  $ncode = $_POST['ncode'];
  $uname = $_POST['uname'];
  $passw = $_POST['passw'];
  $query = "INSERT into `users` (type, name, national_code, uname, passw) VALUES ('$type', '$name', '$ncode','$uname','$passw')";
}
?>
<body class="text-center">
<?php
  include(__DIR__ . "/menu.php");
?>
<div class="main" style="width: 100%;">
  <div class="form-signin">
    <form action="<?php __DIR__ . "/../php/config.php"?>" method="post">
      <div class="form-floating">
        <select name="type" class="form-control" id="floatingInput">
          <option>مدیرکل</option>
          <option>مدیر</option>
          <option>دانش آموز</option>
        </select>
        <label>نقش</label>
      </div>
      <div class="form-floating">
        <input name="name" autocomplete="off" dir="ltr" type="text" class="form-control" id="floatingInput">
        <label>نام و نام خانوادگی</label>
      </div>
      <div class="form-floating">
        <input name="ncode" autocomplete="off" dir="ltr" type="text" class="form-control" id="floatingInput">
        <label>کدملی</label>
      </div>
      <div class="form-floating">
          <input name="uname" autocomplete="off" dir="ltr" type="text" class="form-control" id="floatingInput">
          <label>نام کاربری</label>
        </div>
        <div class="form-floating">
          <input name="passw" autocomplete="off" dir="ltr" type="text" class="form-control" id="floatingPassword">
          <label>گذرواژه</label>
        </div>
        <br>
        <div class="form-floating">
          <button id="sub" type="submit" name="sub" class="w-100 btn btn-lg btn-primary">ایجاد کاربر</button>
        </div>
      </form>
    </div>
</div>
</body>
<style media="screen">
.form-signin{
  width: 100%!important;
  max-width: 330px!important;
  padding: 15px!important;
  position: absolute!important;
  top: 50%!important;
  left: 50%!important;
  transform: translate(-50%)!important;
  margin-top: 15%!important;
}
</style>
</html>
