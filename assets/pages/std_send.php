<?php
include(__DIR__ . "/../php/config.php");
include(__DIR__ . "/menu.php");
?>
<div class="container text-center p-1">
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
  <div class="form-floating">
        <select name="type" class="form-control accepter" id="floatingInput">
            <?php
                $res = $PDO->query("SELECT * FROM `users` WHERE `school` = '" . $user_data['school'] . "' AND type = 'accepter'");
                if ($res->rowCount() == 0) {
                    echo "<option value='" . $accepter['id'] . "'>";
                    echo "موردی یافت نشد، با مدرسه خود تماس حاصل کنید.";
                    echo "</option>";
                    echo "<script>document.querySelector('#scoreSub').removeEventListener('click' , sendScoreRequest);</script>";
                } else {
                    foreach ($res as $accepter) {
                        echo "<option value='" . $accepter['id'] . "'>";
                        echo $accepter['name'];
                        echo "</option>";
                    }
                }
            ?>
        </select>
      <label>به:</label>
  </div>
  <button type="button" id="scoreSub" class="w-100 btn btn-lg btn-primary mt-2">ارسال</button>
  <p class="mt-5 mb-3 text-muted" dir="ltr">©1400</p>
</div>
<script>
    document.querySelector("#scoreSub").addEventListener("click" , sendScoreRequest);
    function sendScoreRequest() {
        let teadad = $(".teadad").val();
        let about = $(".about").val();
        let accepter = $(".accepter").val();
        splash();
        document.querySelector("#scoreSub").addEventListener("click" , sendScoreRequest);
        $.get({
            url: api_server + "/send/?n=" + teadad + "&f=" + about + "&id=<?php echo $user_data['id']; ?>&s=<?php echo $user_data['school']; ?>&a=" + accepter,
            success: (txt) => {
                unsplash();
                if (txt === "true") {
                    Box("ارسال موفقیت آمیز بود." , "باید منتظر تایید کادر مدرسه باشید!" , "sendBox");
                }else {
                    Box("خطا!" , "خطا در ارسال اطلاعات" , "error-in-send-score-request");
                }
            },
            error: () => {
                unsplash();
                Box("خطا!" , "خطا در ارسال اطلاعات" , "error-in-send-score-request");
            }
        });
        document.querySelector("#scoreSub").addEventListener("click" , sendScoreRequest);
    }
</script>
<style>
    body {
        padding-top: 0!important;
    }
.form-signin{
    width: 100%;
    max-width: 330px;
    padding: 15px;
    margin: auto;
    position: absolute;
    left: 50%;
    top: 50%!important;
    transform: translate(-50% , -50%)!important;
}
</style>