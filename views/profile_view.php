<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ</title>
</head>
<body>
    <?php if($user->id === $login_user->id): ?>
    <h1>マイページ</h1>
    <?php else: ?>
    <h1>メンバー情報</h1>
    <?php endif; ?>
    
    <?php if($flash_message !== null): ?>
    <p><?= $flash_message ?></p>
    <?php endif; ?>
    
    <img src='upload/<?= $user->image ?>' style="width:200px;">
    
    <?php if($user->id === $login_user->id): ?>
    <a href="profile_pic_edit.php">編集</a>
    <?php endif; ?>
    
    <p>名前：<?= $user->name ?></p>
    <p>プロフィール：<?= $user->self_introduction ?></p>
    <p>推し：<?= $user->favorite_person ?></p>
    <a href="index.php">戻る</a>
    
    <?php if($user->id === $login_user->id): ?>
    <a href="profile_edit.php">編集</a>
    <?php endif; ?>
    
    <?php if($user->id === $login_user->id): ?>
    <p>お気に入りの場所</p>
    <?php if(count($favorites) !== 0): ?>
    <?php foreach($favorites as $favorite): ?>
    <a href="show.php?place_id=<?= $favorite->get_place()->id ?>">
    <p><?= $favorite->get_place()->name ?></p>
    <img src='upload/<?= $favorite->get_place()->image1 ?>' style="width:200px;">
    <p><?= $favorite->get_place()->introduction ?></p>
    <p><?= $favorite->get_place()->nearest_station ?></p>
    <p><?= $favorite->get_place()->price ?></p>
    </a>
    <?php endforeach; ?>
    <?php else: ?>
    <p>まだお気に入りはありません</p>
    <?php endif; ?>
    <?php endif; ?>
    
    
    
    
    
    
    
</body>
</html>