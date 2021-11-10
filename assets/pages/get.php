<?php
include(__DIR__ . "/../php/config.php");
$res = $PDO->query("SELECT * FROM `scores`");
?>
<body>
<?php include(__DIR__."/../pages/menu.php"); ?>
<table class="table table-striped table-hover table-bordered">
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
            echo "<td>هنوز</td>";
            echo "<td>دانش</td>";
            echo "<td>آموزی</td>";
            echo "<td>درخواستی</td>";
            echo "<td>ثبت</td>";
            echo "<td>نکرده</td>";
            echo "<td>است</td>";
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
                $st = "در انتظار تایید کادر مدرسه";
              }else if ($req['status'] == 0) {
                $st = "رد شده.";
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
function check_scopes(id) {
    splash();
    $.get({
        url: api_server + "/scopes/?a=c&id=" + id + "&si=<?php echo $user_data['id'] ?>",
        success: (txt) => {
            unsplash();
            if (txt === "true") {
                Box("تأیید" , "درخواست مورد نظر با موفقیت تأیید شد." , "neiasr");
            } else {
                Box("خطا!" , "خطایی در تأیید درخواست مورد نظر بوجود آمد." , "eiasr");
            }
        },
        error: (err) => {
            unsplash();
            Box("خطا!" , "خطایی در تأیید درخواست مورد نظر بوجود آمد." , "eiasr");
        }
    });
}
</script>