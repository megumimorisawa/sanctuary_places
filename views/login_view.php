<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ログイン</title>
    </head>
    <body>
        <h1>ログイン</h1>
        <?php if($flash_message !== null): ?>
        <p><?= $flash_message ?></p>
        <?php endif; ?>
        <?php if($error_message !== null): ?>
        <p><?= $error_message ?></p>
        <?php endif; ?>
    
        <form action="login_check.php" method="POST">
            <p>メールアドレス</p>
            <div><input type="text" name="email"></div>
            <p>パスワード(6文字以上)</p>
            <div><input type="password" name="password"></div>
            <input type="submit" value="ログイン">
        </form>
        
        <p><a href="signup.php">新規会員登録</a></p>
    </body>
</html>