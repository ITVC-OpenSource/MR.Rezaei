<?php
include(__DIR__ . "/../php/config.php");
$res = $PDO->query("SELECT * FROM `scores` WHERE `status` = 1");
?>
<table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">نام و نام خانوادگی</th>
      <th scope="col">تعداد</th>
      <th scope="col">بابت</th>
      <th scope="col">وضعیت</th>
      <th scope="col">عملیات</th>
    </tr>
  </thead>
  <tbody>
    <?php
        if ($res->rowCount() == 0) {
            echo "<tr>";
            echo "<td>هنوز</td>";
            echo "<td>دانش آموزی</td>";
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
              if ($req['status'] == 1) {
                $st = "در انتظار تایید کادر مدرسه";
              }else if ($req['status'] == 0) {
                $st = "رد شده.";
              }
                echo "<tr>";
                echo "<td>" . $a . "</td>";
                echo "<td>" . $name['name'] . "</td>";
                echo "<td>" . $req['number'] . "</td>";
                echo "<td>" . $req['about'] . "</td>";
                echo "<td>" . $st . "</td>";
                echo "<td class='text-center'>";
                echo "<i class='bi bi-check-square-fill text-primary' style='margin-left: 2.5px;font-size: 20px;' onclick='check(" . $req['id'] . ")'></i>";
                if ($req['status'] !== 0) {
                  echo "<i class='bi bi-x-square-fill text-danger' style='margin-right: 2.5px;font-size: 20px;' onclick='x(" . $req['id'] . ")'></i>";
                }
                echo "</td>";
                echo "</tr>";
            }
        }
    ?>
  </tbody>
</table>