<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>「聖地さがし」へようこそ！</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap">
        <link rel="stylesheet" href="css/index.css">
    </head>
    <body>
        <div class="index"> 
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
            
            <section class="message">
                <?php if($flash_message !== null): ?>
                <p class="flash-message"><?= $flash_message ?></p>
                <?php endif; ?>
                <?php if($error_message !== null): ?>
                <p class="error-message"><?= $error_message ?></p>
                <?php endif; ?>
            </section>
            
            <section class="main">
                <img src="css/image/index_top.jpeg" alt="聖地登録画像">
                <div class="main-post">
                    <p class="main-post-ttx1">新しく見つけた聖地を登録しよう！</p>
                    <p class="main-post-ttx2">Let's register the place</p>
                    <div class="main-post-btn">
                        <a class="main-post-btn-entry" href="new.php">登録</a>
                    </div>
                </div>
            </section>
            
            <section class="search">
                <div class="search-top">
                    <p class="search-top-ttl1">聖地をさがそう！<br/><span class="search-top-ttl2">Let's find！</span></p>
                </div>
                <div class="search-inner">
                    <div class="search-ttl">
                        <h2>K-POPグループから探す</h2>
                    </div>
                    
                    <div class="search-content">
                        <div class="search-man">
                            <div class="search-box">
                                <img src="css/image/index_man.png" alt="男性画像"><span class="search-box-ttl">男性</span>
                                <div class="search-box-name">
                                    <a href="list.php?genre_name=BTS">BTS</a>
                                    <a href="list.php?genre_name=BIGBANG">BIGBANG</a>
                                    <a href="list.php?genre_name=EXO">EXO</a>
                                    <a href="list.php?genre_name=GOT7">GOT7</a>
                                    <a href="list.php?genre_name=IKON">IKON</a>
                                    <a href="list.php?genre_name=MONSTA X">MONSTA X</a>
                                    <a href="list.php?genre_name=NCT">NCT</a>
                                    <a href="list.php?genre_name=SEVENTEEN">SEVENTEEN</a>
                                    <a href="list.php?genre_name=SHINee">SHINee</a>
                                    <a href="list.php?genre_name=SUPER JUNIOR">SUPER JUNIOR</a>
                                    <a href="list.php?genre_name=THE BOYZ">THE BOYZ</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="search-woman">
                            <div class="search-box">    
                                <img src="css/image/index_woman.png" alt="女性画像"><span class="search-box-ttl">女性</span>
                                <div class="search-box-name">
                                    <a href="list.php?genre_name=pespa">pespa</a>
                                    <a href="list.php?genre_name=APRIL">APRIL</a>
                                    <a href="list.php?genre_name=BLACKPINK">BLACKPINK</a>
                                    <a href="list.php?genre_name=GFRIEND">GFRIEND</a>
                                    <a href="list.php?genre_name=(G)I-DLE">(G)I-DLE</a>
                                    <a href="list.php?genre_name=ITZY">ITZY</a>
                                    <a href="list.php?genre_name=IU">IU</a>
                                    <a href="list.php?genre_name=IZ*ONE">IZ*ONE</a>
                                    <a href="list.php?genre_name=MAMAMOO">MAMAMOO</a>
                                    <a href="list.php?genre_name=OH MY GIRL">OH MY GIRL</a>
                                    <a href="list.php?genre_name=TWICE">TWICE</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="search-ttl">
                            <h2>ドラマから探す</h2>
                        </div>
                        
                        <div class="search-tv">
                            <div class="search-box">    
                                <img src="css/image/index_tv.png" alt="TV画像">
                                <div class="search-box-name">
                                    <a href="list.php?genre_name=愛の不時着">愛の不時着</a>
                                    <a href="list.php?genre_name=梨泰院クラス">梨泰院クラス</a>
                                    <a href="list.php?genre_name=サイコだけど大丈夫">サイコだけど大丈夫</a>
                                    <a href="list.php?genre_name=サム、マイウェイ">サム、マイウェイ</a>
                                    <a href="list.php?genre_name=相続者たち">相続者たち</a>
                                    <a href="list.php?genre_name=太陽の末裔">太陽の末裔</a>
                                    <a href="list.php?genre_name=チャングムの誓い">宮廷女官チャングムの誓い</a>
                                    <a href="list.php?genre_name=トッケビ">トッケビ</a>
                                    <a href="list.php?genre_name=ピノキオ">ピノキオ</a>
                                    <a href="list.php?genre_name=冬のソナタ">冬のソナタ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                    <script src="main.js"></script>
                </div>
            </section>
        </div>    
    </body>
</html>