<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ</title>
</head>
<body>
    <h1>マイページ</h1>
    <?php if($flash_message !== null): ?>
    <p><?= $flash_message ?></p>
    <?php endif; ?>
    
    <img src='upload/<?= $user->image ?>' style="width:200px;">
    <a href="profile_pic_edit.php?id=<?= $user->id ?>">編集</a>
    
    <p>名前：<?= $user->name ?></p>
    <p>プロフィール：<?= $user->self_introduction ?></p>
    <p>推し：<?= $user->favorite_person ?></p>
    
    <a href="index.php?id=<?= $user->id ?>">戻る</a>
    <a href="profile_edit.php?id=<?= $user->id ?>">編集</a>
    
    <p>お気に入りの場所</p>
    <p><?= $place->name ?></p>
    <img src='upload/<?= $place->image1 ?>' style="width:200px;">
    <p><?= $place->introduction ?></p>
    <p><?= $place->nearest_station ?></p>
    <p><?= $place->price ?></p>
    
    
    
    
    
    
    
</body>
</html>