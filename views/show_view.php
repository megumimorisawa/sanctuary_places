<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>聖地詳細情報</title>
</head>
<body>
    <h1>聖地詳細情報</h1>
    <?php if($flash_message !== null): ?>
    <p><?= $flash_message ?></p>
    <?php endif; ?>
    
    場所の名称：<?= $place->name ?><br/>
    <img src='upload/<?= $place->image1 ?>'>
    <img src='upload/<?= $place->image2 ?>'>
    <img src='upload/<?= $place->image3 ?>'>
    <img src='upload/<?= $place->image4 ?>'>
    <img src='upload/<?= $place->image5 ?>'><br/>
    紹介文：<?= $place->introduction ?><br/>
    郵便番号：<?= $place->postal_code ?><br/>
    住所：<?= $place->address ?><br/>
    電話番号：<?= $place->tel ?><br/>
    営業時間：<?= $place->open_time ?>〜<?= $place->close_time ?><br/>
    定休日：<?= $place->close_date ?><br/>
    最寄駅：<?= $place->nearest_station ?><br/>
    予約可否：<?= $place->booking ?><br/>
    価格帯：<?= $place->price ?><br/>
    <form action="favorite.php" method="POST">
        <input type="submit" value="お気に入り">
        <input type="hidden" name="place_id" value="<?= $place->id ?>">
    </form>
    
    <br/>
    <br/>
    <h2>クチコミ一覧</h2>
    
    <?php if(count($reviews) !== 0): ?>
    <?php foreach($reviews as $review): ?>
    <p>名前：<a href="#"><?= $review->get_user()->name ?></a></p>
    <img src='upload/<?= $review->image1 ?>'><img src='upload/<?= $review->image2 ?>'><img src='upload/<?= $review->image3 ?>'><img src='upload/<?= $review->image4 ?>'>
    <p>タイトル：<?= $review->title ?></p>
    <p>訪れた月：<?= $review->month ?>月</p>
    <p>内容：<?= $review->content ?></p>
    <p>更新日：<?= $review->created_at ?></p>
    <?php endforeach; ?>
    <?php else: ?>
    <p>口コミはまだありません</p>
    <?php endif;?>
    
    <a href="index.php">ホーム画面へ戻る</a>
    <a href="review.php?place_id=<?= $place->id ?>">クチコミ投稿</a>
    
    <form action="list.php" method="POST">
        <input type="submit" value="戻る">
        <input type="hidden" name="genre_name" value="<?= $place->genre_name ?>">
    </form>

    
</body>
</html>