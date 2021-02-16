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
            <li><a href="profile.php?id=<?= $login_user->id ?>">my page</a></li>
            <li><a href="contact.php">contact</a></li>
        </ul>
        
        <?php if($flash_message !== null): ?>
        <p><?= $flash_message ?></p>
        <?php endif; ?>
        <?php if($error_message !== null): ?>
        <p><?= $error_message ?></p>
        <?php endif; ?>
    
        <h1>「聖地さがし」</h1>
        <p>K-POPアイドル/韓国ドラマ好きのための聖地巡礼情報アプリ</p>
        
        <a href="new.php">新しく見つけた聖地を登録</a>
        
        <h2>K-POPグループから探す</h2>
        <h3>男性</h3>
        <div><a href="list.php?genre_name=BTS">BTS</a></div>
        <div><a href="list.php?genre_name=BIGBANG">BIGBANG</a></div>
        <div><a href="list.php?genre_name=IKON">IKON</a></div>
        
        <h3>女性</h3>
        <div><a href="list.php?genre_name=BLACKPINK">BLACKPINK</a></div>
        <div><a href="list.php?genre_name=TWICE">TWICE</a></div>
        <div><a href="list.php?genre_name=IU">IU</a></div>
        
        <h3>ドラマから探す</h3>
        <div><a href="list.php?genre_name=愛の不時着">愛の不時着</a></div>
        <div><a href="list.php?genre_name=梨泰院クラス">梨泰院クラス</a></div>
        <div><a href="list.php?genre_name=冬のソナタ">冬のソナタ</a></div>
        
        
        
        <a href="logout.php">ログアウト</a>
        
    </body>
</html>