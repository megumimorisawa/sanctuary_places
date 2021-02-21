<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap">
        <link rel="stylesheet" href="css/login.css">
        <title>ログイン</title>
    </head>
    <body>
        <div class="login">
            <section class="login-header">
                <div class="login-header-inner">
                <img src="css/image/logo.png" alt="ロゴ画像" style="width:200px;height:50px">
                </div>
            </section>
            
            <section class="login-main">
                <div class="login-main-inner">
                    <h1 class="login-main-ttl">ログイン</h1>
                    <div class="login-main-message">
                        <?php if($flash_message !== null): ?>
                        <p><?= $flash_message ?></p>
                        <?php endif; ?>
                        <?php if($error_message !== null): ?>
                        <p><?= $error_message ?></p>
                        <?php endif; ?>
                    </div>
                    
                    <div class="login-main-form">
                        <form action="login_check.php" method="POST">
                            <p class="login-main-form-ttx">メールアドレス</p>
                            <div class="login-main-form-input"><input type="text" name="email" placeholder="例） abcde@gmail.com" style="height:27px;width:60%"></div>
                            <p class="login-main-form-ttx">パスワード(半角英数字6文字以上)</p>
                            <div class="login-main-form-input"><input type="password" name="password" style="height:27px"></div>
                            
                            <div class="login-main-btn">
                                <input class="login-main-login-btn" type="submit" value="ログイン"><br/><br/>
                                <a href="signup.php">新規会員登録</a>
                            </div>
                            
                        </form>
                    </div>
                
                    
                    
                </div>
                
            </section>
            
        </div>
    </body>
</html>