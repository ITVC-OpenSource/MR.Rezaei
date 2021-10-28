<?php
include(__DIR__ . "/../php/config.php");
?>
<body class="bg-light text-center">
<?php
include(__DIR__ . "/menu.php");
?>
<div class="container form-signin main text-center p-1">
  <img class="mb-4" src="/favicon.ico" alt="" width="150px">
  <h1 class="h4 mb-3 fw-normal">برای ارسال درخواست امتیاز فرم زیر را پر کنید</h1>
  <div class="form-floating">
    <input autocomplete="off" dir="ltr" type="text" class="form-control teadad" id="floatingInput">
    <label for="floatingInput">چند:</label>
  </div>
  <div class="form-floating">
    <input autocomplete="off" dir="ltr" type="text" class="form-control about" id="floatingPassword">
    <label for="floatingPassword">بابت:</label>
  </div>
  <button id="scoreSub" class="w-100 btn btn-lg btn-primary">ارسال</button>
  <p class="mt-5 mb-3 text-muted" dir="ltr">©1400</p>
</div>
<style>
.form-signin{
  padding: 15px!important;
  transform: translateX(-50%)!important;
}
</style>