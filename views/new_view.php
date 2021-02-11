<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>見つけた聖地を登録しよう</title>
    </head>
    <body>
        <h1>新しい聖地発見！</h1>
        <?php if($errors !== null): ?>
        <ul>
            <?php foreach($errors as $error): ?>
            <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        
        <form action="create.php" method="POST" enctype="multipart/form-data">
            <p>グループ名・ドラマ名</p>
            <div><select name="genre-name">
                <option value="BTS">BTS</option>
                <option value="BIGBANG">BIGBANG</option>
                <option value="IKON">IKON</option>
                <option value="BLACK PINK">BLACK PINK</option>
                <option value="TWICE">TWICE</option>
                <option value="IU">IU</option>
                <option value="aino">愛の不時着</option>
                <option value="ite">梨泰院クラス</option>
                <option value="kumo">雲が描いた月明かり</option>
            </select></div>
            <p>場所の名称</p>
            <div><input type="text" name="name"></div>
            <p>紹介文</p>
            <div><input type="text" name="introduction"</div>
            <p>郵便番号</p>
            <div><input type="text" name="postal_code" autocomplete="postal-code"></div>
            <p>住所</p>
            <div><input type="text" name="address" autocomplete="address-level1"></div>
            <p>電話番号</p>
            <div><input type="text" name="tel" autocomplete="tel" placeholder="090-1234-5678"></div>
            <p>営業時間</p>
            <div>開始<input type="time" name="open_time"></div>
            <div>終了<input type="time" name="close_time"></div>
            <p>定休日</p>
            <div><input type="text" name="close_date"></div>
            <p>最寄駅（徒歩何分かも分かれば）　※任意</p>
            <div><input type="text" name="nearest-station"></div>
            <p>予約可否　※任意</p>
            <div><input type="text" name="booking"></div>
            <p>価格帯　※任意</p>
            <div><select name="price">
                <option value="0-999">¥0〜¥999</option>
                <option value="1000-1999">¥1,000〜¥1,999</option>
                <option value="2000-2999">¥2,000〜¥2,999</option>
                <option value="3000-3999">¥3,000〜¥3,999</option>
                <option value="4000-4999">¥4,000〜¥4,999</option>
                <option value="5000-5999">¥5,000〜¥5,999</option>
                <option value="6000-6999">¥6,000〜¥6,999</option>
                <option value="7000-7999">¥7,000〜¥7,999</option>
                <option value="8000-8999">¥8,000〜¥8,999</option>
                <option value="8000-8999">¥9,000〜¥9,999</option>
                <option value="other">それ以上</option>
            </select></div>
            <p>写真　一枚は必須</p>
            <div><input type="file" name="image1"></div>
            <div><input type="file" name="image2"></div>
            <div><input type="file" name="image3"></div>
            <div><input type="file" name="image4"></div>
            <div><input type="file" name="image5"></div><br/>
            
            <input type="button" onclick="history.back()" value="戻る">
            <input type="submit" value="登録">
        </form>
        
    </body>
</html>