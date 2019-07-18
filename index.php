<?php
require_once '../../config.php';
require_once './func.php';
$file_path = PATH.FILE;

if(isset($_GET['re'])){
    $re = $_GET['re'];
}else{
    $re = 0;
}
if(isset($_POST['respons'])){
    $respons = $_POST['respons'];
}else{
    $respons = 0;
}
if(isset($_POST['nickname'])){
    $csv = get_csv_list($file_path);
    $nickname = $_POST['nickname'];
    if(!$re){
        $genre = $_POST['genre'];
    }else{
        $genre = $csv[$respons][3];
    }
    if($respons==0){
        $respons='';
    }
    $message = new_line($_POST['message']);
    $image = $_FILES['image'];
    write_csv($file_path,$nickname,$message,$genre,$respons,0,date('YmdHis'),$image['tmp_name']);
}

//選択
if(isset($_POST['select'])){
    $select = $_POST['select'];
}else{
    $select = '全て';
}
if(isset($_GET['del'])){
    del_csv($file_path,$_GET['del']);
}
if(($data_list = get_csv_list($file_path)) === false){  
}
require_once './tpl/index.php';
?>