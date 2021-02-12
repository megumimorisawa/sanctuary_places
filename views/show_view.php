<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>聖地詳細情報</title>
</head>
<body>
    <h1>聖地詳細情報</h1>
    
    場所の名称：<?= $place->name ?><br/>
    <img src='upload/<?= $place->image1 ?>'><br/>
    紹介文：<?= $place->introduction ?><br/>
    郵便番号：<?= $place->postal_code ?><br/>
    住所：<?= $place->address ?><br/>
    電話番号：<?= $place->tel ?><br/>
    営業時間：<?= $place->open_time ?>〜<?= $place->close_time ?><br/>
    定休日：<?= $place->close_date ?><br/>
    最寄駅：<?= $place->nearest_station ?><br/>
    予約可否：<?= $place->booking ?><br/>
    価格帯：<?= $place->price ?><br/>
    <br/>
    <br/>
    <h2>クチコミ一覧</h2>
    
    
    <a href="index.php">ホーム画面へ戻る</a>
    
</body>
</html>