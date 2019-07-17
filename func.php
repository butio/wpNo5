<?php
//csvのファイルを開いて配列で返す
function get_csv_list($file_path){
    if(!(file_exists($file_path))){
        return false;
    }else{
        $fp = @fopen($file_path,'r');
        if(!$fp){
           return false;
        }else{
            $data_list = array();
            if(flock($fp,LOCK_EX)){
                while(($data = fgets($fp))){
                    $data = explode(',' , $data);
                    $data_list[] = $data;
                }
                flock
                ($fp,LOCK_UN);
                fclose($fp);
                return $data_list;
            }else{
                return false;
            }
        }
    }
}
//csvの中身の項目数を返す
function cn_csv($num1){
    $csv = get_csv_list($num1);
    $cn = count($csv);
    if($cn===0){
        return false;
    }else{
        return true;
    }
}
//csvファイルへの書き込み
function write_csv($num1,$num2,$num3,$num4,$num5,$num6,$num7,$img){
    $fp = @fopen($num1,'a');
    $csv = get_csv_list($num1);
    $cn = count($csv);
    $maxNum = array();
    if(isset($csv[0][0])){
        for($i=0;$i<$cn;$i++){
            $maxNum[] .= $csv[$i][0];
        }
        $num = max($maxNum);
        $num += 1;
    }else{
        $num = 1;
    }
    move_uploaded_file("$img",UPLOAD_PATH."$num".".jpg");
    fwrite($fp,"$num".','."$num2".','."$num3".','."$num4".','."$num5".','."$num6".','."$num7"."\n");
    fclose($fp);    
}
//メッセージの改行コード変換
function new_line($num1){
    $line=["\r\n","\r","\n"];
    $num1 = str_replace($line,"<br>",$num1);
    return $num1;
}

// 指定したキーに対応する値を基準に、配列をソートする
function sortByKey($key_name, $sort_order, $array) {
    foreach ($array as $key => $value) {
        $standard_key_array[$key] = $value[$key_name];
    }
    array_multisort($standard_key_array, $sort_order, $array);
    return $array;
}
//削除フラグ変更
function del_csv($file_path,$num2){
    $csv = get_csv_list($file_path);
    $fp = @fopen($file_path,'w');
    $cn = count($csv);
    foreach($csv as $data){
            if($data[0]===$num2){
                $data[5]=1;
            }
            $line = implode(',',$data);
            fwrite($fp,$line);
    }
    fclose($fp); 
}
?>