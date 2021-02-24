<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap">
    <link rel="stylesheet" href="css/profile_edit.css">
    <title>マイページ編集</title>
</head>
<body>
    <div class="profile-edit">
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
        
        <section class="main">
            <div class="main-inner">
                <div class="main-ttl">
                    <h1>プロフィール編集</h1>
                </div>
                <div class="form">
                    <form action="profile_edit_done.php" method="POST">
                        <p class="form-name">ニックネーム&emsp;<span>※必須</span></p>
                        <div class="form-input"><input type="text" name="name" value="<?= $user->name ?>" style="height:27px"></div>
                        <p class="form-name">プロフィール</p>
                        <div class="form-input"><input type="text" name="self_introduction" value="<?= $user->self_introduction ?>" style="width:90%;height:45px" placeholder="例） BTS押しのファン歴５年目です。基本的にみんな好きです♡"></textarea></div>
                        <p class="form-name">推し</p>
                        <div class="form-input"><input type="text" name="favorite_person" value="<?= $user->favorite_person ?>" style="height:27px" placeholder="例） ジミンちゃん"></div>
                        
                        <div class="form-btn">
                            <input class="form-btn-edit" type="submit" value="更新"><br/>
                            <input class="form-btn-back" type="button" onclick="history.back()" value="戻る">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="main.js"></script>
</body>
</html>