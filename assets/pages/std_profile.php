<?php
include(__DIR__ . '/../php/config.php');
include(__DIR__ . '/../pages/menu.php');
if ($user_data['type'] == "full_admin") {
   $type = "مدیر کل";
} else if ($user_data['type'] == "admin") {
    $type = "مدیر";
}else if ($user_data['type'] == "student") {
    $type = "دانش آموز";
}
?>
<body class="text-center">
<div class="main" style="width: calc(100% - 0.5em);">
    <table class="table table-hover table-striped table-bordered text-center m-1">
        <thead>
            <th scope="col">نام و نام خانوادگی</th>
            <th scope="col">نام کاربری</th>
            <th scope="col">گذرواژه</th>
            <th scope="col">کد ملی</th>
            <th scope="col">کلاس</th>
            <th scope="col">نقش</th>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $user_data["name"]; ?></td>
                <td id="uname"><?php echo $user_data["uname"]; ?></i></td>
                <td id="passw"><?php echo $user_data["passw"]; ?>  <i class="bi bi-pencil-square text-primary" onclick="editInformation();console.log('Hello');"></i></td>
                <td><?php echo $user_data["national_code"]; ?></td>
                <td><?php echo $user_data["class"]; ?></td>
                <td><?php echo $type; ?></td>
            </tr>
        </tbody>
    </table>
</div>
<script>
function editInformation() {
    $("#passw").html("<input type='text' value='<?php echo $user_data['passw']; ?>'></input> <i class='bi bi-pencil-square text-primary' onclick='sendInformation();'></i>");
}
function sendInformation() {
    $.get({
        url: api_server + "/edit/?type=passw&old=" + <?php echo $user_data['passw'] ?> + "&txt=" + $("#passw input").val(),
    });
    $("#passw").html($("#passw input").val() + "  <i class='bi bi-pencil-square text-primary' onclick='editInformation();'></i>");
}
</script>
</body>