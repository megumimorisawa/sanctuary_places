<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap">
    <link rel="stylesheet" href="css/profile_pic_edit.css">
    <link rel="icon" href="favicon.ico">
    <title>マイページ編集</title>
</head>
<body>
    <div class="profile-pic-edit">
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
                    <h1>プロフィール画像編集</h1>
                </div>
                
                <div class="form">
                    <form action="profile_pic_edit_done.php" method="post" enctype="multipart/form-data">
                        <p class="form-name">現在の画像</p>
                        <img src='upload/<?= $user->image ?>' style="width:200px;">
                        
                        <p class="form-name">新しい画像を選択</p>
                        <div class="form-input"><input type="file" name="image"></div>
                        
                        <div class="form-btn">
                            <input class="form-btn-update" type="submit" value="更新"><br/>
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