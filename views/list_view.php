<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap">
    <link rel="stylesheet" href="css/list.css">
    <title>詳細画面</title>
</head>
    <body>
        <div class="list">
            <section class="header">
                <div class="header-inner">
                    <img src="css/image/logo.png" alt="ロゴ画像">
                    <ul>
                        <li><a href="profile.php?id=<?= $login_user->id ?>">マイページ</a></li>
                        <li><a href="contact.php">お問い合わせ</a></li>
                        <li><a href="logout.php">ログアウト</a></li>
                    </ul>
                </div>
            </section>
                
            <div class="list-inner">
                <section class="message">
                    <?php if($flash_message !== null): ?>
                    <p><?= $flash_message ?></p>
                    <?php endif; ?>
                </section>
                
                <section class="main">
                    <div class="main-ttl">
                        <h1>聖地一覧</h1>
                    </div>
                    <?php if(count($places) !== 0): ?>
                    <?php foreach($places as $place): ?>
                    
                    <div class="main-box">
                        <img src='upload/<?= $place->image1 ?>'>
                        <div class="main-box-content">
                            <a href="show.php?place_id=<?= $place->id ?> ?>"><p><?= $place->name ?></p></a>
                            <p class="main-box-content-comment"><?= $place->introduction ?></p>
                            <p>最寄駅&thinsp;/&thinsp;<?= $place->nearest_station ?></p>
                            <p>価格帯&thinsp;/&thinsp;<?= $place->price ?></p>
                        </div>
                        <br/>
                        <br/>
                    </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <p>登録された聖地はまだありません</p>
                    <?php endif; ?>
                </section>
            </div>
                
            <div class="back-btn">
                <a href="index.php">ホーム画面へ戻る</a>
            </div>    
        </div>
    </body>
</html>