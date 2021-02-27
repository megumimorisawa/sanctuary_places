<?php
    session_start();
    
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = null;
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap">
        <link rel="stylesheet" href="css/contact.css">
        <title>お問い合わせ</title>
    </head>
    <body>
        <div class="contact">
            <section class="header">
                <div class="header-inner">
                    <a href="index.php"><img src="css/image/logo.png" alt="ロゴ画像"></a>
                    <nav class="header-nav">
                        <button><img src="css/image/button.png" alt="ボタン画像"></button>
                        <ul>
                            <li><a href="profile.php?id=<?= $login_user->id ?>">マイページ</a></li>
                            <li><a href="contact.php">お問い合わせ</a></li>
                            <li><a href="logout.php">ログアウト</a></li>
                        </ul>
                    </nav>
                </div>
            </section>
            
            <div class="contact-ttl">
                <h1>お問い合わせ</h1>
            </div>
            
            <?php if($errors !== null): ?>
                <ul>
                    <?php foreach($errors as $error): ?>
                    <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        
            <section class="form">
                <form action="contact_check.php" method="post">
                    <p class="form-name">お名前</p>
                    <div class="form-input"><input type="text" name="name" style="height:27px"></div>
                    <p class="form-name">メールアドレス</p>
                    <div class="form-input"><input type="email" name="email" style="height:27px;width:50%"></div>
                    <p class="form-name">内容</p>
                    <div class="form-input"><textarea type="text" name="message" rows="5" style="width:90%"></textarea></div>
                    <div class="form-btn">
                        <input class="form-btn-send" type="submit" value="送信">
                    </div>
                </form>
            </section>
            
            <div class="home-btn">
                <a href="index.php">ホーム画面へ戻る</a>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="main.js"></script>
    </body>
</html>