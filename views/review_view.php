<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>クチコミ投稿画面</title>
</head>
<body>
    <h1>クチコミ投稿</h1>
    <?php if($errors !== null): ?>
    <ul>
        <?php foreach($errors as $error): ?>
        <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    
    <form action="review_done.php" method="POST" enctype="multipart/form-data">
        タイトル：<input type="text" name="title"><br/>
        行った時期：<select name="month">
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
                    </select><br/>
        コメント：<input type="text" name="content"><br/>
        画像：<br/>
            <input type="file" name="image1"><br/>
            <input type="file" name="image2"><br/>
            <input type="file" name="image3"><br/>
            <input type="file" name="image4"><br/>
            
        <input type="hidden" name="place_id" value="<?= $place->id ?>">
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="登録">
    </form>
    
</body>
</html>