<?php
include(__DIR__."/../php/config.php");
$f_students = $PDO->query("SELECT * FROM `users` WHERE `school` = '" . $user_data['school'] . "' AND `status` = 1");
$n_students = $PDO->query("SELECT * FROM `users` WHERE `school` = '" . $user_data['school'] . "' AND `status` = 0");
?>
<body>
<?php include(__DIR__."/../pages/menu.php"); ?>
<table class="table table-striped table-hover table-bordered text-center">
    <thead>
    <th scope="col">#</th>
    <th scope="col">نام و نام خانوادگی</th>
    <th scope="col">نام کاربری</th>
    <th scope="col">گذرواژه</th>
    <th scope="col">کد ملی</th>
    <th scope="col">کلاس</th>
    <th scope="col">نقش</th>
    <th scope="col">وضعیت</th>
    <th scope="col">عملیات</th>
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
            echo "<td class='text-center'>";
            echo "<a href='?action=delete_user' id='sub' onclick='delete_us(`" . $student['id'] . "`);'><i class='bi bi-x-square-fill text-danger' style='font-size: 17.5px;'></i></a>";
            echo "</td>";
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
            echo "<td class='text-center'><a href='/dashboard/?action=delete_user' id='sub' onclick='delete_us(`" . $student['id'] . "`);><i class='bi bi-x-square-fill text-danger' style='font-size: 17.5px;'></i></a></td>";
            echo "</tr>";
        }
    }
    ?>
    </tbody>
</table>
</body>
<script>
    function delete_us(id){
        $.get({
            url : api_server + "/delete_user/index.php?id=" + id,
            processData : false,
            contentType : false,
            success : function(res){
                if (res === "true") {
                    window.history.back();
                }else {
                    window.alert("خطایی حین انجام اطلاعات رخ داد.");
                }
            },
            error : function(err){
                window.alert("خطایی حین انجام اطلاعات رخ داد.");
            }
        });
    }
</script>
</html>