<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap">
    <link rel="stylesheet" href="css/review.css">
    <title>クチコミ投稿画面</title>
</head>
    <body>
        <div class="review">
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
            
            <div class="main">
                <div class="main-ttl">
                    <h1>クチコミ投稿</h1>
                </div>
     
                <div class="main-inner">
                    <section class="error">
                        <?php if($errors !== null): ?>
                        <ul>
                            <?php foreach($errors as $error): ?>
                            <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </section>
                
                    <section class="form">
                        <form action="review_done.php" method="POST" enctype="multipart/form-data">
                            <p class="form-name">タイトル&emsp;<span>※必須</span></p>
                            <div class="form-input"><input type="text" name="title" placeholder="例） コスパも店内も最高でした！" style="width:50%;height:27px"></div>
                            <p class="form-name">行った時期&emsp;<span>※必須</span></p>
                            <div class="form-input"><select name="month" style="height:27px">
                                    <option value="1">1月</option>
                                    <option value="2">2月</option>
                                    <option value="3">3月</option>
                                    <option value="4">4月</option>
                                    <option value="5">5月</option>
                                    <option value="6">6月</option>
                                    <option value="7">7月</option>
                                    <option value="8">8月</option>
                                    <option value="9">9月</option>
                                    <option value="10">10月</option>
                                    <option value="11">11月</option>
                                    <option value="12">12月</option>
                            </select></div>
                            
                            <p class="form-name">コメント&emsp;<span>※必須</span></p>
                            <div class="form-input"><input type="text" name="content" placeholder="例） 店内にはたくさんメンバーの写真がありました。" style="width:80%;height:27px"></div>
                            <p class="form-name">画像&emsp;<span>※一枚は必須</span></p>
                            <div class="form-input"><input type="file" name="image1" style="height:27px"></div>
                            <div class="form-input"><input type="file" name="image2" style="height:27px"></div>
                            <div class="form-input"><input type="file" name="image3" style="height:27px"></div>
                            <div class="form-input"><input type="file" name="image4" style="height:27px"></div>
                            
                            <div class="form-btn">
                                <input type="hidden" name="place_id" value="<?= $place->id ?>">
                                <input class="form-btn-entry" type="submit" value="登録"><br/>
                                <input class="form-btn-back" type="button" onclick="history.back()" value="戻る">
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="main.js"></script>
    </body>
</html>