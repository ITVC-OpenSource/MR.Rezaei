<?php
include(__DIR__ . "/../php/config.php");
include(__DIR__ . "/menu.php");
?>
<div class="container form-signin main text-center p-1">
  <img class="mb-4" src="/favicon.ico" alt="" width="150px">
  <h1 class="h4 mb-3 fw-normal">برای ارسال درخواست امتیاز فرم زیر را پر کنید</h1>
  <div class="form-floating">
    <input autocomplete="off" dir="ltr" type="text" class="form-control" id="floatingInput" id="teadad">
    <label for="floatingInput">چند:</label>
  </div>
  <div class="form-floating">
    <input autocomplete="off" dir="ltr" type="text" class="form-control" id="floatingPassword" id="about">
    <label for="floatingPassword">بابت:</label>
  </div>
  <button onclick="sendScoreRequest();" id="scoreSub" class="w-100 btn btn-lg btn-primary">ارسال</button>
  <p class="mt-5 mb-3 text-muted" dir="ltr">©1400</p>
</div>

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
