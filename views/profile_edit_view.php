<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ編集</title>
</head>
<body>
    <form action="profile_edit_done.php" method="post" enctype="multipart/form-data">
        <p>ニックネーム</p>
        <div><input type="text" name="neme" value="<?= $user->name ?>"></div>
        <p>プロフィール</p>
        <div><input type="text" name="self_introduction" value="<?= $user->self_introduction ?>"></div>
        <p>推し</p>
        <div><input type="text" name="favorite_person" value="<?= $user->favorite_person ?>"></div>
        <input type="hidden" name="id" value="<?= $user->id ?>">
        <input type="submit" value="更新">
    </form>
    
</body>
</html>