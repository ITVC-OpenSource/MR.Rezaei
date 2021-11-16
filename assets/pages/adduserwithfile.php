<div class="container">
<form action="" method="post" class="form-floating text-center form-data">
    <a class="btn btn-primary mb-3" href="/docs/add_user_with_file/" target="_blank">اگر نمی دانید چگونه باید این کار را انجام دهید روی این متن کلیک کنید!</a>
    <div class="mb-3" style="direction: ltr;">
        <label for="formFile" class="form-label">یک فایل متنی را انتخاب کنید</label>
        <input class="form-control" type="file" id="formFile" name="file">
    </div>
    <div class="form-floating">
        <button id="sub" type="button" name="sub" class="w-100 btn btn-lg btn-primary">ثبت اطلاعات</button>
    </div>
</form>
</div>
<script>
document.querySelector("#sub").addEventListener("click" , upload);
function upload(){
    var form = $('form')[0];
    var dataForm = new FormData(form);
    splash();
    $.post({
        url : api_server + "/upload/index.php",
        data : dataForm ,
        processData : false,
        contentType : false,
        success : function(res){
            unsplash();
            if (res === "true") {
                window.alert("اطلاعات با موفقیت ثبت شد.");
            } else {
                window.alert("خطایی در ثبت اطلاعات رخ داد.");
            }
        },
        error : function(err){
            unsplash();
            window.alert("خطایی در ثبت اطلاعات رخ داد.");
        }
    });
    document.querySelector("#sub").addEventListener("click" , upload);
}
</script>