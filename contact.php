<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>お問い合わせ</title>
    </head>
    <body>
        <h2>Contact Form</h2>
    
        <form class="form" action="send.php" method="post">
          <input type="text" placeholder="Name" name="name"><br/>
          <input type="email" placeholder="Email" name="email"><br/>
          <textarea placeholder="Message" name="message"></textarea><br/>
          <input type="submit" value="Send">
        </form>
        
        <a href="index.php">戻る</a>
        
    </body>
</html>