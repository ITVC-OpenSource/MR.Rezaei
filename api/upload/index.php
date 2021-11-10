<?php
include(__DIR__ . "/../config.php");
if(!empty($_FILES['file'])){
    $file = $_FILES['file'];
    if($file['error']){
        die("false");
    }
    $type = $file['type'];
    $valid_ext = ["text/plain"];
    if(!in_array($type , $valid_ext)){
        die("false");
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
        $f = fopen(__DIR__ . "/../../uploaded/txt/{$name}" , "r");
        $fr = fread($f , filesize(__DIR__ . "/../../uploaded/txt/{$name}"));
        $a = explode(";
" , $fr);
        //unset($a[sizeof($a) - 1]);
        $res = [];
        foreach ($a as $row) {
            $e = explode("," , $row);
            $q = "INSERT INTO `users`(`name`, `uname`, `passw`, `national_code`, `class`, `school`, `status`, `type`) VALUES ('" . $e[0] . "' , '" . $e[1] . "' , '" . $e[2] . "' , '" . $e[3] . "' , '" . $e[4] . "' , '" . $e[5] . "' , '" . $e[6] . "' , '" . $e[7] . "')";
            $r = $PDO->query($q);
            if (!$r) {
                $res['false'] = "false";
                echo "false";
            } else {
                $res['true'] = "true";
            }
        }
        if (in_array("false" , $res)) {
            echo "false";
        } else {
            echo "true";
        }
        unlink(__DIR__ . "/../../uploaded/txt/{$name}");
    }
} else {
    echo "false";
}
?>
