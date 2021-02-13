<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>「聖地さがし」へようこそ！</title>
    </head>
    <body>
        <img src="#" alt="ロゴ">
        <ul>
            <li><a href="#">about</a></li>
            <li><a href="#">search</a></li>
            <li><a href="profile.php?id=<?= $user->id ?>">my page</a></li>
            <li><a href="#">contact</a></li>
        </ul>
        
        <?php if($flash_message !== null): ?>
        <p><?= $flash_message ?></p>
        <?php endif; ?>
        <?php if($error_message !== null): ?>
        <p><?= $error_message ?></p>
        <?php endif; ?>
    
        <h1>「聖地さがし」</h1>
        <p>K-POPアイドル/韓国ドラマ好きのための聖地巡礼情報アプリ</p>
        
        <a href="new.php?user_id=<?= $user->id ?>">新しく見つけた聖地を登録</a>
        
        <h2>K-POPグループから探す</h2>
        <h3>男性</h3>
        <form action="list.php" method="POST">
            <input type="hidden" name="user_id" value="<?= $user->id ?>">
            <div><input type="submit" name="genre_name" value="BTS"></div>
            <div><input type="submit" name="genre_name" value="BIGBANG"></div>
            <div><input type="submit" name="genre_name" value="IKON"></div>
        </form>
        
        <h3>女性</h3>
        <form action="list.php" method="POST">
            <input type="hidden" name="id" value="<?= $user->id ?>">
            <div><input type="submit" name="genre_name" value="BLACKPINK"></div>
            <div><input type="submit" name="genre_name" value="TWICE"></div>
            <div><input type="submit" name="genre_name" value="IU"></div>
        </form>
        
        
        <h3>ドラマから探す</h3>
        <form action="list.php" method="POST">
            <input type="hidden" name="id" value="<?= $user->id ?>">
            <div><input type="submit" name="genre_name" value="愛の不時着"></div>
            <div><input type="submit" name="genre_name" value="梨泰院クラス"></div>
            <div><input type="submit" name="genre_name" value="雲が描いた月明かり"></div>
        </form>
        
        
        <a href="logout.php">ログアウト</a>
        
    </body>
</html>