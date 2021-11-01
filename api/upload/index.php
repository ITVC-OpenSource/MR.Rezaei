<?php
if(!empty($_FILES['file'])){
    $file = $_FILES['file'];
    if($file['error']){
        die("مشکلی در آپلود فایل شما به وجود آمده است.");
    }
    $type = $file['type'];
    $valid_ext = ["txt"];
    if(!in_array($type , $valid_ext)){
        die('فرمت فایل آپلود شده پشتیبانی نمی شود.');
    }else {
        $name = $file['name'];
        $name = explode('.' , $name);
        $ext = end($name);
        if(2<count($name)){
        $name = array_slice($name , 0 , count($name) - 1);
        $name = implode('.' , $name);
        }else
        $name = $name[0];
        $timestamp = time();
        $name = "{$name}-{$timestamp}.{$ext}";
        $tmp_name = $file['tmp_name'];
        $finall_path = __DIR__ . "/../../uploaded/txt/{$name}";
        move_uploaded_file($tmp_name , $finall_path);
        echo "فایل شما با موفقیت آپلود شد.";
    }
}
?>
