<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="utf-8">
	<title>掲示板</title>
    <!-- BootstrapのCSS読み込み -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <!-- jQuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="./js/bootstrap.min.js"></script>
    
</head>
<body>
<div class="mx-auto w-50">
    <?php if(!$re == 0){
            echo $re.'に返信';
        }else{
            $re='';
        }?>
    <div class="form-group row">
        <div class="col-sm-6">
            <form action="./index.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="respons" value="<?php echo $re;?>">
            <span class="label label-default">ニックネーム</span>
            <input class="form-control" id="focusedInput" type="text" name="nickname">
        </div>
        <div class="col-sm-6">
            <span class="label label-default">ジャンル</span>
            <select name="genre" class="form-control" id="focusedInput">
                <option value="">選択してください</option>
                <option value="映画">映画</option>
                <option value="本">本</option>
                <option value="音楽">音楽</option>
            </select>
        </div>
    </div>
    <div class="col-xs-offset-2 col-xs-10">
        <span class="label label-default">メッセージ</span>
        <textarea class="form-control col-auto" id="textarea1" name="message" rows="3"></textarea>
    </div>
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            <label for="file1">画像</label>
            <input class="form-control-file" id="file1" type="file" name="image">
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            <button type="submit" class="btn btn-primary" value="Submit">投稿</button>
        </div>
    </div>
</form>
<hr>
<form action="./index.php" method="post" enctype="multipart/form-data">
<div class="form-group">
    <span class="label label-default">ジャンル選択</span>
    <select class="form-control col-auto" name="select">
        <option value="全て">全て</option>
        <option value="映画">映画</option>
        <option value="本">本</option>
        <option value="音楽">音楽</option>
    </select>
</div>
<div class="form-group">
    <div class="col-xs-offset-2 col-xs-10">
        <button type="submit" class="btn btn-primary" value="Submit">検索</button>
    </div>
</div>
</form>
<?php if($data_list){?>
<?php foreach ($data_list as $data){?>
<table>
<?php
if($data[4]==''){
    if($data[5]==0){
        if($select==='全て'){?>
            <table>
            <tr><td><?php echo $data[0];?></td>
            <td>ニックネーム：<?php echo $data[1]; echo " "; ?><?php echo $data[3];
            echo date('Y/m/d H:i:s',strtotime($data[6])); ?><a href="./index.php?re=<?php echo $data[0] ?>">[Re]</a><a href="./index.php?del=<?php echo $data[0] ?>">[削除]</a></td></tr>
            <tr><td></td><td><?php echo $data[2];?></td></tr>
            <tr><td></td><td><img src="<?php echo UPLOAD_PATH;echo $data[0] ?>.jpg" width="auto" height="128" alt="<?php echo UPLOAD_PATH;echo $data[0]?>.jpg"></td></tr>
        </table>
    <?php }else{ 
        if($data[3] === $select){?>
            <table>
            <tr><td><?php echo $data[0];?></td>
            <td>ニックネーム：<?php echo $data[1]; echo " "; ?><?php echo $data[3];
            echo date('Y/m/d H:i:s',strtotime($data[6])); ?><a href="./index.php?re=<?php echo $data[0] ?>">[Re]</a><a href="./index.php?del=<?php echo $data[0] ?>">[削除]</a></td></tr>
            <tr><td></td><td><?php echo $data[2];?></td></tr>
            <tr><td></td><td><img src="<?php echo UPLOAD_PATH;echo $data[0] ?>.jpg" width="auto" height="128" alt="<?php echo UPLOAD_PATH;echo $data[0]?>.jpg"></td></tr>
            </table>
        <?php } 
        }
    }
}else{ 
    if($data[5]==0){
        if($select==='全て'){?>
            <table class="table-pd">
            <tr><td></td>
            <td><?php echo $data[0];?>ニックネーム：<?php echo $data[1]; echo " "; ?><?php echo $data[3];
            echo date('Y/m/d H:i:s',strtotime($data[6])); ?><a href="./index.php?re=<?php echo $data[0] ?>">[Re]</a><a href="./index.php?del=<?php echo $data[0] ?>">[削除]</a></td></tr>
            <tr><td></td><td><?php echo $data[2];?></td></tr>
            <tr><td></td><td><img src="<?php echo UPLOAD_PATH;echo $data[0] ?>.jpg" width="auto" height="128" alt="<?php echo UPLOAD_PATH;echo $data[0]?>.jpg"></td></tr>
            </table>
    <?php }else{ 
        if($data[3] === $select){?>
            <table class="table-pd">
            <tr><td></td>
            <td><?php echo $data[0];?>ニックネーム：<?php echo $data[1]; echo " "; ?><?php echo $data[3];
            echo date('Y/m/d H:i:s',strtotime($data[6])); ?><a href="./index.php?re=<?php echo $data[0] ?>">[Re]</a><a href="./index.php?del=<?php echo $data[0] ?>">[削除]</a></td></tr>
            <tr><td></td><td><?php echo $data[2];?></td></tr>
            <tr><td></td><td><img src="<?php echo UPLOAD_PATH;echo $data[0] ?>.jpg" width="auto" height="128" alt="<?php echo UPLOAD_PATH;echo $data[0]?>.jpg"></td></tr>
            </table>
        <?php } 
        }
    }
}?>
<?php }
}?>
</div>
</body>
</html>