<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>詳細画面</title>
</head>
<body>
    <?php if($flash_message !== null): ?>
    <p><?= $flash_message ?></p>
    <?php endif; ?>
    
    <?php if(count($places) !== 0): ?>
    <?php foreach($places as $place): ?>
    <a href="show.php?place_id=<?= $place->id ?> ?>">
        <p>場所の名称：<?= $place->name ?></p>
        <img src='upload/<?= $place->image1 ?>' style="width:200px;">
        <p>紹介文：<?= $place->introduction ?></p>
        <p>最寄駅：<?= $place->nearest_station ?></p>
        <p>価格帯：<?= $place->price ?></p>
    </a>
    <br/>
    <br/>
    <?php endforeach; ?>
    
    <?php else: ?>
    <p>登録された聖地はまだありません</p>
    <?php endif; ?>
    
    <a href="index.php">ホーム画面へ戻る</a>
</body>
</html>