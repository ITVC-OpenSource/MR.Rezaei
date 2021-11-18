<?php
include(__DIR__ . "/../php/config.php");
$res = $PDO->query("SELECT * FROM `scores` WHERE `sender_id` = '" . $user_data['id'] . "'");
?>
<body>
<?php include(__DIR__ . "/menu.php"); ?>
<table class="table table-striped table-hover table-bordered text-center">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">نام و نام خانوادگی</th>
        <th scope="col">تعداد</th>
        <th scope="col">بابت</th>
        <th scope="col">وضعیت</th>
        <th scope="col">لغو</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if ($res->rowCount() == 0) {
        echo "<tr>";
        echo "<td></td>";
        echo "<td>شما</td>";
        echo "<td>هیچ</td>";
        echo "<td>درخواستی</td>";
        echo "<td>ندارید</td>";
        echo "<td></td>";
        echo "</tr>";

    }else {
        $a = 0;
        foreach ($res as $req) {
            $a++;
            $name_q = $PDO->query("SELECT `name` FROM `users` WHERE id = '" . $req['sender_id'] . "'");
            $name = $name_q->fetch(PDO::FETCH_ASSOC);
            if ($req['status'] == 1) {
                $st = "در انتظار تایید کادر مدرسه";
            }else if ($req['status'] == 0) {
                $st = "رد شده.";
            } else if ($req['status'] == 2) {
                $st = "تأیید شده.";
            }
            echo "<tr>";
            echo "<td>" . $a . "</td>";
            echo "<td>" . $name['name'] . "</td>";
            echo "<td>" . $req['number'] . "</td>";
            echo "<td>" . $req['about'] . "</td>";
            echo "<td>" . $st . "</td>";
            echo "<td class='text-center' onclick='a(" . $req['id'] . ")'>";
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
    function na(title , value , cls , id) {
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
          <button onclick="cancle_score_request(${id});" style="width: 49.85%;" type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-right"><strong>تایید</strong></button>
          <button onclick="unna('${cls}');" style="width: 49.85%;" type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-right"><strong>لغو</strong></button>
        </div>
      </div>
    </div>
  </div>`;
    }
    function unna(cls) {
        document.querySelector("." + cls).remove();
        cancle_score_request();
    }
    function a(id) {
        na("آیا برای لغو درخواست مطمئن اید؟" , "پس از لغو درخواست اگر تأیید شده باشد هم حذف می شود." , "na" , id);
    }
function cancle_score_request(id) {
    splash();
    $.get({
        url: api_server + "/cancel/?id=" + id,
        success: (txt) => {
            unsplash();
            if (txt === "true") {
                acceptBox("لغو" , "درخواست مورد نظر با موفقیت لغو شد." , "ok");
            } else {
                acceptBox("لغو" , "خطایی در لغو درخواست مورد نظر رخ داد." , "nok");
            }
        },
        error: (err) => {
            unsplash();
            acceptBox("لغو" , "خطایی در لغو درخواست مورد نظر رخ داد." , "nok");
        },
    });
}
</script>