<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>新規会員登録</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap">
        <link rel="stylesheet" href="css/signup.css">
    </head>
    <body>
        <div class="signup">
            <div class="signup-header">
                <div class="signup-header-inner">
                    <img src="css/image/logo.png" alt="ロゴ画像">
                    <a href="login.php">ログイン</a>
                </div>
            </div>
            <div class="signup-ttl">
                <h1>新規会員登録</h1>
            </div>
            <div class="signup-error">
                <?php if(count($errors) !== 0): ?>
                <ul>
                    <?php foreach($errors as $error): ?>
                    <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
            
            <div class="signup-form">
                <form action="insert.php" method="POST" enctype="multipart/form-data">
                    <p class="signup-ttx">ニックネーム<span>必須</span></p>
                    <div class="signup-input"><input type="text" name="name" placeholder="例） ジヨン大好き" style="height:27px"></div>
                    <p class="signup-ttx">プロフィール画像<span>必須</span></p>
                    <div class="signup-input"><input type="file" name="image" style="height:27px"></div>
                    <p class="signup-ttx">生年月日(YYYYMMDD)<span>必須</span></p>
                    <div class="signup-input"><input type="text" name="birthday" placeholder="例） 19920101" style="height:27px"></div>
                    <p class="signup-ttx">メールアドレス<span>必須</span></p>
                    <div class="signup-input"><input type="text" name="email" placeholder="例） abcde@gmail.com" style="width:60%;height:27px"></div>
                    <p class="signup-ttx">パスワード（半角英数字6文字以上）<span>必須</span></p>
                    <div class="signup-input"><input type="password" name="password" style="height:27px"></div><br/>
                    
                    <div class="signup-btn">
                        <input class="signup-entry-btn" type="submit" value="登録"><br/>
                        <input class="signup-back-btn" type="button" onclick="history.back()" value="戻る">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>