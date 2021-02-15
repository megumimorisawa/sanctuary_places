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
    <a href="profile_pic_edit.php">編集</a>
    
    <p>名前：<?= $user->name ?></p>
    <p>プロフィール：<?= $user->self_introduction ?></p>
    <p>推し：<?= $user->favorite_person ?></p>
    
    <a href="index.php">戻る</a>
    <a href="profile_edit.php">編集</a>
    
    <p>お気に入りの場所</p>
    <?php if(count($favorites) !== 0): ?>
    <?php foreach($favorites as $favorite): ?>
    <p><?= $favorite->get_place()->name ?></p>
    <img src='upload/<?= $favorite->get_place()->image1 ?>' style="width:200px;">
    <p><?= $favorite->get_place()->introduction ?></p>
    <p><?= $favorite->get_place()->nearest_station ?></p>
    <p><?= $favorite->get_place()->price ?></p>
    <?php endforeach; ?>
    <?php else: ?>
    <p>まだお気に入りはありません</p>
    <?php endif; ?>
    
    
    
    
    
    
    
</body>
</html>