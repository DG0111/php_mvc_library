<?php

define("BASE_URL", "http://localhost/baiTap1/");


function dd($val){
    echo "<pre>";
    var_dump($val);die;
}

function img_upload($file){
    if($file['size'] > 0){
        $filename = uniqid() . '-' . $file['name'];
        move_uploaded_file($file['tmp_name'], 'public/images/' . $filename);
        return 'public/images/' . $filename;
    }
    return null;
}
