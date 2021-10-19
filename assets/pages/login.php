<?php include(__DIR__ . '/header.php'); ?>
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
      <div class="checkbox mb-3">
        <label>
          <input id="remember-me" type="checkbox" value="remember-me"> مرا به خاطر بسپار
        </label>
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
<?php
if (isset($user_data)) {
  echo "<script>location.assign('/');</script>";
}
?>
<script>
document.querySelector("#sub").addEventListener("click" , send);
function send() {
  let uname = $("#floatingInput").val();
  let passw = $("#floatingPassword").val();
  let rmm = $("#remember-me").val();
  splash();
  $.get({
    url: api_server + "/login/?u=" + uname + "&p=" + passw,
    success: (txt) => {
      let text = txt.replace("" , "");
      check(text , uname , passw);
      unsplash();
    },
    error: () => {
      if (navigator.Online === "true") {
        net_error();
      } else {
        error_box();
      }
      unsplash();
    }
  });
}
function check(txt , u , p) {
  if (txt === "true") {
    $("#floatingInput").removeClass("is-invalid");
    $("#floatingPassword").removeClass("is-invalid");
    $("#floatingInput").addClass("is-valid");
    $("#floatingPassword").addClass("is-valid");
    localStorage.setItem("uname" , u);
    localStorage.setItem("passw" , p);
    setCookie("uname" , u , 1);
    setCookie("passw" , p , 1);
    location.assign("/");
  } else {
    $("#floatingInput").removeClass("is-valid");
    $("#floatingPassword").removeClass("is-valid");
    $("#floatingInput").addClass("is-invalid");
    $("#floatingPassword").addClass("is-invalid");
  }
}
</script>
</html>
