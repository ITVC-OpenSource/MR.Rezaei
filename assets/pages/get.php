<?php
include(__DIR__ . "/../php/config.php");
$res = $PDO->query("SELECT * FROM `scores` WHERE `accepter` = '" . $user_data['id'] . "' AND `school` = '" . $user_data['school'] . "'");
?>
<body class="text-center">
<?php include(__DIR__."/../pages/menu.php"); ?>
<table class="text-center table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">نام و نام خانوادگی</th>
      <th scope="col">تعداد</th>
      <th scope="col">بابت</th>
      <th scope="col">وضعیت</th>
      <th scope="col">تأیید</th>
      <th scope="col">رد کردن</th>
    </tr>
  </thead>
  <tbody>
    <?php
        if ($res->rowCount() == 0) {
            echo "<tr>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td>درخواستی</td>";
            echo "<td>یافت</td>";
            echo "<td>نشد</td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "</tr>";
        }else {
          $a = 0;
            foreach ($res as $req) {
              $a++;
              $name_q = $PDO->query("SELECT `name` FROM `users` WHERE id = '" . $req['sender_id'] . "'");
              $name = $name_q->fetch(PDO::FETCH_ASSOC);
              if ($name == false) {
                  $name['name'] = "حساب کاربری حذف شده";
              }
              if ($req['status'] == 1) {
                $st = "در انتظار تایید شما";
              }else if ($req['status'] == 0) {
                $st = "رد شده";
              } else if ($req['status'] == 2) {
                  $st = "تأیید شده";
              }
                echo "<tr>";
                echo "<td>" . $a . "</td>";
                echo "<td>" . $name['name'] . "</td>";
                echo "<td>" . $req['number'] . "</td>";
                echo "<td>" . $req['about'] . "</td>";
                echo "<td>" . $st . "</td>";
                if ($req['status'] !== 2) {
                    echo "<td class='text-center' onclick='check_scopes(" . $req['id'] . ")'>";
                    echo "<i class='bi bi-check-square-fill text-primary' style='margin-left: 2.5px;font-size: 20px;'></i>";
                    echo "</td>";
                } else {
                    echo "<td class='text-center'>";
                    echo "تأیید شده";
                    echo "</td>";
                }
                echo "<td class='text-center' onclick='x_scopes(" . $req['id'] . ")'>";
                if ($req['status'] !== 0) {
                    echo "<i class='bi bi-x-square-fill text-danger' style='margin-right: 2.5px;font-size: 20px;'></i>";
                }
                echo "</td>";
                echo "</tr>";
            }
        }
    ?>
  </tbody>
</table>
</body>
<script>
function acceptBox (title , value , cls) {
    $('body').css('height' , "100%");
    document.body.innerHTML += `
  <div class="${cls}" style='height: 100%;'>
  <div class='drk-bg'></div>
    <div class="modal-dialog Box" role="document">
      <div class="modal-content rounded-4 shadow">
        <div class="modal-body p-4 text-center">
          <h5 class="mb-0">${title}</h5>
          <p class="mb-0">${value}</p>
        </div>
        <div class="modal-footer flex-nowrap p-0">
          <button onclick="unAcceptBox('${cls}');" style="width: 100%;" type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-right"><strong>تایید</strong></button>
        </div>
      </div>
    </div>
  </div>`;
}
function unAcceptBox(cls) {
    document.querySelector("." + cls).remove();
    location.reload();
}
function check_scopes(id) {
    splash();
    $.get({
        url: api_server + "/scopes/?a=c&si=<?php echo $user_data['id']; ?>&id=" + id,
        success: (txt) => {
            unsplash();
            if (txt === "true") {
                acceptBox("تأیید" , "درخواست مورد نظر با موفقیت تأیید شد." , "neiasr");
            } else {
                acceptBox("خطا!" , "خطایی در تأیید درخواست مورد نظر بوجود آمد." , "eiasr");
            }
        },
        error: (err) => {
            unsplash();
            acceptBox("خطا!" , "خطایی در تأیید درخواست مورد نظر بوجود آمد." , "eiasr");
        }
    });
}
function x_scopes(id) {
    splash();
    $.get({
        url: api_server + "/scopes/?a=x&si=<?php echo $user_data['id']; ?>&id=" + id,
        success: (txt) => {
            unsplash();
            if (txt === "true") {
                acceptBox("رد شده" , "درخواست مورد نظر با موفقیت رد شد." , "neiasr");
            } else {
                acceptBox("خطا!" , "خطایی در رد کردن درخواست مورد نظر بوجود آمد." , "eiasr");
            }
        },
        error: (err) => {
            unsplash();
            acceptBox("خطا!" , "خطایی در رد کردن درخواست مورد نظر بوجود آمد." , "eiasr");
        }
    });
}
</script>