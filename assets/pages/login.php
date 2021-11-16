<?php include(__DIR__ . '/../php/config.php'); ?>
<?php include(__DIR__ . '/menu.php'); ?>
<body class="text-center">
  <main class="form-signin">
    <div class="login-frm">
      <img class="mb-4" src="/favicon.ico" alt="" width="150px">
      <h1 class="h4 mb-3 fw-normal">دبیرستان استعداد های درخشان شهید دکتر رمضانخانی</h1>
      <div class="form-floating">
        <input autocomplete="off" dir="ltr" type="text" class="form-control" id="floatingInput">
        <label for="floatingInput">نام کاربری</label>
      </div>
      <div class="form-floating">
        <input autocomplete="off" dir="ltr" type="password" class="form-control" id="floatingPassword">
        <label for="floatingPassword">گذرواژه</label>
      </div>
      <button onclick="send();" id="sub" class="w-100 btn btn-lg btn-primary">ورود</button>
      <p class="mt-5 mb-3 text-muted" dir="ltr">©1400</p>
    </div>
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
  margin-top: 60px;
  height: calc(100% - 60px);
  left: 50%;
  transform: translateX(-50%);
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
<script>
if ($_COOKIE['uname'] !== undefined && $_COOKIE['passw'] !== undefined && $_COOKIE['uname'] !== "out" && $_COOKIE['passw'] !== "out") {
  location.assign("/dashboard/");
}
</script>
</html>
