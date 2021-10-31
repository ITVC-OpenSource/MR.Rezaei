<?php
include(__DIR__."/../php/config.php");
$students = $PDO->query("SELECT * FROM `users` WHERE `school` = '" . $user_data['school'] . "'");
?>
<body>
<?php include(__DIR__."/../pages/menu.php"); ?>
<table class="table table-striped table-hover table-bordered">
    <thead>
        <th scope="col">#</th>
        <th scope="col">نام و نام خانوادگی</th>
        <th scope="col">نام کاربری</th>
        <th scope="col">گذرواژه</th>
        <th scope="col">کد ملی</th>
        <th scope="col">کلاس</th>
        <th scope="col">نقش</th>
        <th scope="col">وضعیت</th>
        <th scope="col">ویرایش</th>
    </thead>
    <tbody>
        <?php
        if ($students->rowCount() == 0) {
            echo "<tr>کابری از مدرسه شما یافت نشد.</tr>";
        } else {
            foreach ($students as $student) {
                echo "<tr>";
                echo "<td>" . $student['name'] . "</td>";
                echo "<td>" . $student['uname'] . "</td>";
                echo "<td>" . $student['passw'] . "</td>";
                echo "<td>" . $student['national_code'] . "</td>";
                echo "<td>" . $student['class'] . "</td>";
                echo "<td>" . $type . "</td>";
                echo "<td>" . $student['status'] . "</td>";
                echo "<td class='text-center'><div onclick='location.assign(" . $server . "/dashboard/?edit_user&user=" . $student['id'] . ");' href=''><i class='bi bi-pencil-square text-primary' style='font-size: 17.5px;'></i></div></td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
</body>
</html>