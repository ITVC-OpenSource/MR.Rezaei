<?php
include(__DIR__."/../php/config.php");
$students = $PDO->query("SELECT * FROM `users` WHERE `school` = '" . $user_data['school'] . "'");
$f_students = $PDO->query("SELECT * FROM `users` WHERE `school` = '" . $user_data['school'] . "' AND `status` = 1");
$n_students = $PDO->query("SELECT * FROM `users` WHERE `school` = '" . $user_data['school'] . "' AND `status` = 0");
if (isset($_GET['user'])) {
    ?>
    <body>
    <?php include(__DIR__."/../pages/menu.php"); ?>
    <div class="edit-user-form">
        
    </div>
    <?php
}else {
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
        if ($f_students->rowCount() == 0) {
            echo "<tr>کابری از مدرسه شما یافت نشد.</tr>";
        } else {
            $a = 0;
            foreach ($f_students as $student) {
                $a++;
                if ($student['status'] == 1) {
                    $student['status'] = "فعال";
                }
                if ($student['type'] == "full_admin") {
                    $std_type = "مدیر کل";
                }else if ($student['type'] == "admin") {
                    $std_type = "مدیر";
                }else if ($student['type'] == "student") {
                    $std_type = "دانش آموز";
                }
                $ncode = $student['national_code'];
                echo "<tr>";
                echo "<td>" . $a . "</td>";
                echo "<td>" . $student['name'] . "</td>";
                echo "<td>" . $student['uname'] . "</td>";
                echo "<td>" . $student['passw'] . "</td>";
                echo "<td>" . $student['national_code'] . "</td>";
                echo "<td>" . $student['class'] . "</td>";
                echo "<td>" . $std_type . "</td>";
                echo "<td>" . $student['status'] . "</td>";
                echo "<td class='text-center'><a href='/dashboard/?action=edit_user&user=" . $student['id'] . "'><i class='bi bi-pencil-square text-primary' style='font-size: 17.5px;'></i></a></td>";
                echo "</tr>";
            }
            foreach ($n_students as $student) {
                $a++;
                if ($student['status'] == 0) {
                    $student['status'] = "بایگانی شده";
                }
                if ($student['type'] == "full_admin") {
                    $std_type = "مدیر کل";
                }else if ($student['type'] == "admin") {
                    $std_type = "مدیر";
                }else if ($student['type'] == "student") {
                    $std_type = "دانش آموز";
                }
                $ncode = $student['national_code'];
                echo "<tr>";
                echo "<td>" . $a . "</td>";
                echo "<td>" . $student['name'] . "</td>";
                echo "<td>" . $student['uname'] . "</td>";
                echo "<td>" . $student['passw'] . "</td>";
                echo "<td>" . $student['national_code'] . "</td>";
                echo "<td>" . $student['class'] . "</td>";
                echo "<td>" . $std_type . "</td>";
                echo "<td>" . $student['status'] . "</td>";
                echo "<td class='text-center'><a href='/dashboard/?action=edit_user&user=" . $student['id'] . "'><i class='bi bi-pencil-square text-primary' style='font-size: 17.5px;'></i></a></td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
<?php } ?>
</body>
</html>