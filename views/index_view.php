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
        
        <a href="new.php">新しく見つけた聖地を登録</a>
        
        <h2>K-POPグループから探す</h2>
        <p>男性</p>
        <?php foreach($places as $place): ?>
        <ul>
            <li><a href="show.php?genre_name=<?= $place->genre_name ?>">BTS</a></li>
            <li><a href="#">BIGBANG</a></li>
            <li><a href="#">IKON</a></li>
        </ul>
        
        <p>女性</p>
        <ul>
            <li><a href="#">BLACK PINK</a></li>
            <li><a href="#">TWICE</a></li>
            <li><a href="#">IU</a></li>
        </ul>
        
        <h2>ドラマから探す</h2>
        <a href="#">愛の不時着</a>
        <a href="#">梨泰院クラス</a>
        <a href="#">雲が描いた月明かり</a>
        <?php endforeach; ?>
        
        <a href="logout.php">ログアウト</a>
        
    </body>
</html>