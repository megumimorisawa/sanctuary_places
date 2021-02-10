<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>新規会員登録</title>
    </head>
    <body>
        <h1>新規会員登録</h1>
        <?php if(count($errors) !== 0): ?>
        <ul>
            <?php foreach($errors as $error): ?>
            <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        
        <form action="insert.php" method="POST" enctype="multipart/form-data">
            <p>ニックネーム</p>
            <div><input type="text" name="name"></div>
            <p>プロフィール画像</p>
            <div><input type="file" name="image"></div>
            <p>生年月日(YYYYMMDD)</p>
            <div><input type="text" name="birthday"></div>
            <p>メールアドレス</p>
            <div><input type="text" name="email"></div>
            <p>パスワード（半角英数字6文字以上）</p>
            <div><input type="password" name="password"></div><br/>
            
            <input type="button" onclick="history.back()" value="戻る">
            <input type="submit" value="登録">
        </form>
    </body>
</html>