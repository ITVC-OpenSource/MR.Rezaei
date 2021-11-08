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
        <?php $tsq = $PDO->query("SELECT * FROM `users` WHERE id = '" . $_GET['user'] . "'"); if ($tsq->rowCount() == 1) {$ts = $tsq->fetch(PDO::FETCH_ASSOC);}else {$ts = $user_data;} ?>
        <?php
        if ($ts['type'] == "full_admin") {
        $u_type = "مدیر کل";
        }else if ($ts['type'] == "admin") {
            $u_type = "مدیر";
        }else if ($ts['type'] == "student") {
            $u_type = "دانش آموز";
        } else {
            $u_type = "دانش آموز";
        }
        ?>
        <div class="form-signin" style="top: 50%;padding: 25px;border-radius: 15px;border: 1px solid #989898;background-color: rgba(0,0,0,0.05);">
            <form class="login-frm" action="" method="get">
            <div class="form-floating" style="border-top-right-radius: 10px;border-top-left-radius: 10px;">
                <input style="border-top-right-radius: 10px!important;border-top-left-radius: 10px!important;" autocomplete="off" dir="auto" type="text" class="form-control name" id="floatingInput" value="<?php echo $ts['name']; ?>">
                <label for="floatingInput">نام و نام خانوادگی</label>
            </div>
            <div class="form-floating" style="border-radius: 0;">
                <input autocomplete="off" dir="auto" type="text" class="form-control uname" style="border-radius: 0!important;" id="floatingInput" value="<?php echo $ts['uname']; ?>">
                <label for="floatingInput">نام کاربری</label>
            </div>
            <div class="form-floating" style="border-radius: 0;">
                <input autocomplete="off" dir="auto" type="text" class="form-control passw" style="border-radius: 0!important;" id="floatingInput" value="<?php echo $ts['passw']; ?>">
                <label for="floatingInput">گذرواژه</label>
            </div>
            <div class="form-floating" style="border-radius: 0;">
                <input autocomplete="off" dir="auto" type="text" class="form-control ncode" style="border-radius: 0!important;" id="floatingInput" value="<?php echo $ts['national_code']; ?>">
                <label for="floatingInput">کدملی</label>
            </div>
            <div class="form-floating" style="border-radius: 0;">
                <input autocomplete="off" dir="auto" type="text" class="form-control class" style="border-radius: 0!important;" id="floatingInput" value="<?php echo $ts['class']; ?>">
                <label for="floatingInput">کلاس</label>
            </div>
            <div class="form-floating" style="border-radius: 0;">
                <select name="status" id="floatingInput" autocomplete="off" dir="ltr" class="form-control status" style="border-radius: 0!important;">
                    <option value="<?php echo $ts['status']; ?>"><?php if ($ts['status'] == "1") {echo "فعال";} else {echo "بایگانی شده";} ?></option>
                    <option value="1">فعال</option>
                    <option value="0">بایگانی شده</option>
                </select>
                <label for="floatingInput">وضعیت</label>
            </div>
            <div class="form-floating" style="border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;">
                <select name="type" id="floatingInput" autocomplete="off" dir="ltr" class="form-control type" style="border-bottom-right-radius: 10px!important;border-bottom-left-radius: 10px!important;border-top-left-radius: 0!important;border-top-right-radius: 0!important;">
                    <option value="<?php echo $ts['type']; ?>"><?php echo $u_type; ?></option>
                    <option value="full_admin">مدیرکل</option>
                    <option value="admin">مدیر</option>
                    <option value="student">دانش آموز</option>
                </select>
                <label for="floatingInput">نقش</label>
            </div>
                <button type="button" id="sub" class="btn btn-primary" style="margin-top: 15px;width: 100%;">ویرایش</button>
            </form>
        </div>
    </div>
    <script>
        document.querySelector("#sub").addEventListener("click" , edit);
        function edit(){
            var name = $(".name").val();
            var uname = $(".uname").val();
            var passw = $(".passw").val();
            var ncode = $(".ncode").val();
            var cls = $(".class").val();
            var status = $(".status").val();
            var type = $(".type").val();
            $.get({
                url : api_server + "/edit_user/index.php?id=<?php echo $_GET['user']; ?>&name=" + name + "&uname=" + uname + "&passw=" + passw + "&national_code=" + ncode + "&class=" + cls + "&status=" + status + "&type=" + type,
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