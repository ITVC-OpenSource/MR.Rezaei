<?php
 include(__DIR__ . '/header.php');
     $type = $_POST['type'];
     $name = $_POST['name'];
     $ncode = $_POST['ncode'];
 		 $uname = $_POST['uname'];
 		 $passw = $_POST['passw'];
 		$query = "INSERT into `users` (type, name, national_code, uname, passw)
 	VALUES ('$type', '$name', '$ncode','$uname','$passw')";
 ?>
<body class="text-center">
  <main class="form-signin">
    <form action="<?php
    __DIR__ . "/../php/config.php"
    ?>" method="post">
    <div class="form-floating">
      <select name="type" class="form-control" id="floatingInput">
        <option>مدیر کل</option>
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
        <input id="sub" type="submit" value="ایجاد کاربر"  class="w-100 btn btn-lg btn-primary">
      </div>
    </form>
  </main>
</body>
<style>
html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

#floatingInput{
  border-bottom-left-radius: unset!important;
  border-bottom-right-radius: unset!important;
}
</style>
</html>
