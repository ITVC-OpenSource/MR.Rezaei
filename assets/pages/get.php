<?php
include(__DIR__ . "/../php/config.php");
$res = $PDO->query("SELECT * FROM `scores` WHERE `status` = 1");
?>
<table class="table table-striped table-hover">
  <thead>
    <tr>
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
            echo "Empty";
        }else {
            foreach ($res as $req) {
                echo "<tr>";
                echo "<td>" . $req['sender_id'] . "</td>";
                echo "<td>" . $req['number'] . "</td>";
                echo "<td>" . $req['about'] . "</td>";
                echo "<td>" . $req['status'] . "</td>";
                echo "<td>";
                echo "<i class='bi bi-check-square-fill text-primary' style='font-size: 20px;' onclick='check(" . $req['id'] . ")'></i>";
                echo "<i class='bi bi-x-square-fill text-danger' style='font-size: 20px;' onclick='x(" . $req['id'] . ")'></i>";
                echo "</td>";
                echo "</tr>";
            }
        }
    ?>
  </tbody>
</table>