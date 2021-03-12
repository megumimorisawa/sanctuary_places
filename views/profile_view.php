<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="icon" href="favicon.ico">
    <title>ユーザーページ</title>
</head>
    <body>
        <div class="profile">
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
                    <div class="ttl">
                        <?php if($user->id === $login_user->id): ?>
                        <h1>マイページ</h1>
                        <?php else: ?>
                        <h1>メンバー情報</h1>
                        <?php endif; ?>
                    </div>
            
                    <section class="message">
                        <?php if($flash_message !== null): ?>
                        <p><?= $flash_message ?></p>
                        <?php endif; ?>
                    </section>
                    
                    <div class="main-image">
                        <img src='upload/<?= $user->image ?>'>
                        
                        <div class="main-image-btn">
                            <?php if($user->id === $login_user->id): ?>
                            <a href="profile_pic_edit.php">写真を編集</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="main-content">
                        <p><?= $user->name ?></p>
                        <p class="main-content-ttl">[プロフィール]</p>
                        <?php if($user->self_introduction === ''): ?>
                        <?php print '<p class="main-content-ttx">まだプロフィールは登録されていません</p>'; ?>
                        <?php else: ?>
                        <?php print '<p class="main-content-ttx">'.$user->self_introduction.'</p>'; ?>
                        <?php endif; ?>
                        
                        <p class="main-content-ttl">[推し]</p>
                        <?php if($user->favorite_person === ''): ?>
                        <?php print '<p class="main-content-ttx">まだ推しは登録されていません</p>'; ?>
                        <?php else: ?>
                        <?php print '<p class="main-content-ttx">'.$user->favorite_person.'</p>'; ?>
                        <?php endif; ?>
                        
                        <div class="main-content-btn">
                            <?php if($user->id === $login_user->id): ?>
                            <a href="profile_edit.php">編集</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="favorite">
                <?php if($user->id === $login_user->id): ?>
                <div class="favorite-ttl">
                    <p>お気に入りの場所</p>
                </div>
                
                <div class="favorite-list">
                    <?php if(count($favorites) !== 0): ?>
                    <?php foreach($favorites as $favorite): ?>
                    <div class="favorite-list-box">
                        <div class="favorite-image">
                            <img src='upload/<?= $favorite->get_place()->image1 ?>' style="width:200px;">
                        </div>
                        
                        <div class="favorite-content">
                            <a href="show.php?place_id=<?= $favorite->get_place()->id ?>"><p><?= $favorite->get_place()->name ?></p></a>
                            <p class="favorite-content-comment"><?= $favorite->get_place()->introduction ?></p>
                            <p>最寄駅&thinsp;/&thinsp;<?= $favorite->get_place()->nearest_station ?></p>
                            <p>予算&thinsp;/&thinsp;<?= $favorite->get_place()->price ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php else: ?>
                <p>まだお気に入りはありません</p>
                <?php endif; ?>
                <?php endif; ?>
            </section>
            <div class="back-btn">
                <a href="index.php">ホームへ戻る</a>
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="main.js"></script>
        </div>
    </body>
</html>