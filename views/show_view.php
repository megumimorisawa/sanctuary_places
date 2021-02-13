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
    
    <?php foreach($reviews as $review): ?>
    <p>名前：<?= $review->get_user()->name ?></p>
    <p>タイトル：<?= $review->title ?></p>
    <p>訪れた月：<?= $review->month ?>月</p>
    <p>内容：<?= $review->content ?></p>
    <p>更新日：<?= $review->created_at ?></p>
    <?php endforeach; ?>
    
    <!--<form action="index.php" method="POST">-->
    <!--    <input type="submit" value="ホーム画面へ">-->
    <!--    <input type="hidden" name="user_id" value="<?= $user->id ?>">-->
    <!--</form>-->
    
    <a href="index.php?user_id=<?= $user->id ?>">ホーム画面へ戻る</a>
    <a href="review.php?id=<?= $place->id ?>">クチコミ投稿</a>
    
    <form action="list.php" method="POST">
        <input type="submit" value="戻る">
        <input type="hidden" name="genre_name" value="<?= $place->genre_name ?>">
        <input type="hidden" name="user_id" value="<?= $user->id ?>">
    </form>
    <!--<a href="list.php?genre_name=<?= $place->genre_name ?>">聖地一覧へ戻る</a>-->
    
</body>
</html>