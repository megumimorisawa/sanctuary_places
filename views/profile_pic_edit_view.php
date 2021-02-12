<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ編集</title>
</head>
<body>
    <form action="profile_pic_edit_done.php" method="post" enctype="multipart/form-data">
        <p>現在の画像</p>
        <img src='upload/<?= $user->image ?>' style="width:200px;">
        
        <p>新しい画像を選択</p>
        <div><input type="file" name="image"></div>
    
        <input type="hidden" name="id" value="<?= $user->id ?>">
        <input type="submit" value="更新">
    </form>
    
</body>
</html>