<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>詳細画面</title>
</head>
<body>
    <?php foreach($places as $place): ?>
    <a href="show.php?id=<?= $place->id ?>">
    場所の名称：<?= $place->name ?><br/>
    紹介文：<?= $place->introduction ?><br/>
    最寄駅：<?= $place->nearest_station ?><br/>
    価格帯：<?= $place->price ?><br/>
    <img src='upload/<?= $place->image1 ?>' style="width:200px;">
    </a>
    <br/>
    <br/>
    
    <?php endforeach; ?>
    
    <a href="index.php">ホーム画面へ戻る</a>
    
</body>
</html>