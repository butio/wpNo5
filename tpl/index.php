<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="utf-8">
	<title>掲示板</title>
    <!-- BootstrapのCSS読み込み -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="./js/bootstrap.min.js"></script>
    
</head>
<body>
<div class="mx-auto w-50">
<form action="./index.php" method="post" enctype="multipart/form-data">
ニックネーム<input type="text" name="nickname">
ジャンル<select name="genre">
<option value="映画">映画</option>
<option value="本">本</option>
<option value="音楽">音楽</option>
</select><br>
メッセージ<textarea name="message" rows="3" cols="50" ></textarea><br>
<input type="file" name="image"><br>
<button type="submit" value="send">投稿</button>
</form>
<form action="./index.php" method="post" enctype="multipart/form-data">
ジャンル選択<select name="select">
<option value="全て">全て</option>
<option value="映画">映画</option>
<option value="本">本</option>
<option value="音楽">音楽</option>
</select>
<button type="submit" value="select">検索</button><br>
</form>
<table class="table mx-auto text-center">
<?php if($sorted_array){?>
<?php foreach ($sorted_array as $data){?>
<?php
if($data[5]=='0'){
if($select==='全て'){
    echo $data[0];?>
    ニックネーム：<?php echo $data[1];
    echo date('Y/m/d H:i:s',strtotime($data[6])); ?><a href="./index.php?del=<?php echo $data[0] ?>">[削除]</a><br>
    <?php echo $data[2];?><br>
    <img src="<?php echo UPLOAD_PATH;echo $data[0] ?>.jpg" width="auto" height="128" alt="<?php echo UPLOAD_PATH;echo $data[0]?>.jpg"><br>
<?php }else{ 
    if($data[3] === $select){
        echo $data[0];?>
        ニックネーム：<?php echo $data[1];
        echo date('Y/m/d H:i:s',strtotime($data[6])); ?><a href="./index.php?del=<?php echo $data[0] ?>">[削除]</a><br>
        <?php echo $data[2];?><br>
        <img src="<?php echo UPLOAD_PATH;echo $data[0] ?>.jpg" width="auto" height="128" alt="<?php echo UPLOAD_PATH;echo $data[0]?>.jpg"><br>
    <?php } 
    }?>
</table>
<?php }
}
}?>
</div>
</body>
</html>