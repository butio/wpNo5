<?php
require_once '../../config.php';
require_once './func.php';
$file_path = PATH.FILE;
//返信かどうかのチェック
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
//値が送られているかチェック
if(isset($_POST['nickname'])){
    $csv = get_list($file_path);
    $nickname = $_POST['nickname'];
    if($respons==0){
        $genre = $_POST['genre'];
    }else{
        $re_text = $respons-1;
        $genre = $csv[$re_text][3];
    }
    $message = new_line($_POST['message']);
    $image = $_FILES['image'];
    write_csv($file_path,$nickname,$message,$genre,$respons,0,date('YmdHis'),$image['tmp_name']);
}

//選択チェック
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