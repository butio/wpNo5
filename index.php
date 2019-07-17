<?php
require_once '../../config.php';
require_once './func.php';
$file_path = PATH.FILE;
if(isset($_POST['nickname'])){
    $nickname = $_POST['nickname'];
    $genre = $_POST['genre'];
    $message = new_line($_POST['message']);
    $image = $_FILES['image'];
    write_csv($file_path,$nickname,$message,$genre,'',0,date('YmdHis'),$image['tmp_name']);
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
if(cn_csv($file_path)){
    $sorted_array = sortByKey('6',SORT_DESC,$data_list);
}else{
    $sorted_array = false;
}

require_once './tpl/index.php';
?>