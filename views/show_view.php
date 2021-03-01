
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap">
        <link rel="stylesheet" href="css/show.css">
        <title>聖地詳細情報</title>
    </head>
    <body>
        <div class="show">
            <section class="header">
                <div class="header-inner">
                    <a href="index.php"><img src="css/image/logo.png" alt="ロゴ画像"></a>
                    <nav class="header-nav">
                        <button><img src="css/image/button.png" alt="ボタン画像"></button>
                        <ul>
                            <li><a href="profile.php?id=<?= $login_user->id ?>">マイページ</a></li>
                            <li><a href="contact.php">お問い合わせ</a></li>
                            <li><a href="logout.php">ログアウト</a></li>
                        </ul>
                    </nav>
                </div>
            </section>
            
            <section class="message">
                <?php if($flash_message !== null): ?>
                <p><?= $flash_message ?></p>
                <?php endif; ?>
            </section>
            
            <div class="show-ttl">
                <h1>聖地詳細情報</h1>
            </div>

            <section class="main">
                <div class="main-inner">
                    <div class="main-top">
                        <div class="main-content">
                            <h2><?= $place->name ?></h2>
                            <div class="main-content-favorite-btn">
                                <?php if($place->is_favorite($login_user->id) === false): ?>
                                <form action="favorite.php" method="POST">
                                    <input type="submit" value="お気に入り">
                                    <input type="hidden" name="place_id" value="<?= $place->id ?>">
                                </form>
                                <?php else: ?>
                                <form action="favorite_delete.php" method="POST">
                                    <input type="submit" value="お気に入り解除">
                                    <input type="hidden" name="place_id" value="<?= $place->id ?>">
                                </form>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="main-content-ttx">
                            <p><?= $place->introduction ?></p>
                        </div>
                        
                        <div class="main-content-image">
                            <ul class="main-content-image-list">
                                <?php if($place->image1 === ''): ?>
                                <?php print '' ?>
                                <?php else: ?>
                                <?php print "<li><a class='main-content-image-item' href='upload/$place->image1'><img src='upload/$place->image1' alt='Photo1'></a></li>" ?>
                                <?php endif; ?>
                                <?php if($place->image2 === ''): ?>
                                <?php print '' ?>
                                <?php else: ?>
                                <?php print "<li><a class='main-content-image-item' href='upload/$place->image2'><img src='upload/$place->image2' alt='Photo2'></a></li>" ?>
                                <?php endif; ?>
                                <?php if($place->image3 === ''): ?>
                                <?php print '' ?>
                                <?php else: ?>
                                <?php print "<li><a class='main-content-image-item' href='upload/$place->image3'><img src='upload/$place->image3' alt='Photo3'></a></li>" ?>
                                <?php endif; ?>
                                <?php if($place->image4 === ''): ?>
                                <?php print '' ?>
                                <?php else: ?>
                                <?php print "<li><a class='main-content-image-item' href='upload/$place->image4'><img src='upload/$place->image4' alt='Photo4'></a></li>" ?>
                                <?php endif; ?>
                                <?php if($place->image5 === ''): ?>
                                <?php print '' ?>
                                <?php else: ?>
                                <?php print "<li><a class='main-content-image-item' href='upload/$place->image5'><img src='upload/$place->image5' alt='Photo5'></a></li>" ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    
                    <table>
                        <tr>
                            <th>聖地名</th><td><?= $place->name ?></td>
                        </tr>
                        <tr>
                            <th>お問い合わせ先</th><td><?= $place->tel ?></td>
                        </tr>
                        <tr>
                            <th>予約可否</th><td><?= $place->booking ?></td>
                        </tr>
                        <tr>
                            <th>住所</th><td><?= $place->address ?><br/><input type="hidden" name="address" id="address" value="<?= $place->address ?>"><div id="map"></div></td>
                        </tr>
                        <tr>
                            <th>最寄駅</th><td><?= $place->nearest_station ?></td>
                        </tr>
                        <tr>
                            <th>営業時間(ラストオーダー)・定休日</th><td><?= $place->open_time ?>〜<?= $place->close_time ?>
                            <?php if(($place->last_order) === '00:00:00'): ?>
                            <?php print ""; ?> 
                            <?php else: ?>
                            (<?= $place->last_order ?>)
                            <?php endif; ?><br/>
                            <?= $place->close_date ?></td>
                        </tr>
                        <tr>
                            <th>価格帯</th><td><?= $place->price ?></td>
                        </tr>
                    </table>
                </div>
            </section>
            
            <section class="review">
                <div class="review-ttl">
                    <h2>クチコミ一覧</h2>
                </div>
                
                <div class="review-comment">
                    <a href="review.php?place_id=<?= $place->id ?>">クチコミ投稿</a>
                </div>
                
                <?php if(count($reviews) == 0): ?>
                <?php print "<p>レビューはまだありません</p>"; ?>
                <?php else: ?>
                <?php foreach($reviews as $review): ?>
                <div class="review-box">
                    <div class="review-content">
                        <div class="review-content-top">
                            <a href="profile.php?id=<?= $review->user_id ?>"><?= "<img class='review-content-image' src=upload/".$review->get_user()->image.">" ?><?= $review->get_user()->name ?></a>
                        </div>
                        <p>「<?= $review->title ?>」</p>
                        <p>訪れた月：<?= $review->month ?>月</p>
                        <div class="review-content-ttx">
                            <p><?= $review->content ?></p>
                        </div>
                    </div>
                    
                    <ul class="review-box-image">
                        <?php if($review->image1 === ''): ?>
                        <?php print '' ?>
                        <?php else: ?>
                        <?php print "<li><a class='review-image' href='upload/$review->image1'><img src='upload/$review->image1'></a></li>" ?>
                        <?php endif; ?>
                        <?php if($review->image2 === ''): ?>
                        <?php print '' ?>
                        <?php else: ?>
                        <?php print "<li><a class='review-image' href='upload/$review->image2'><img src='upload/$review->image2'></a></li>" ?>
                        <?php endif; ?>
                        <?php if($review->image3 === ''): ?>
                        <?php print '' ?>
                        <?php else: ?>
                        <?php print "<li><a class='review-image' href='upload/$review->image3'><img src='upload/$review->image3'></a></li>" ?>
                        <?php endif; ?>
                        <?php if($review->image4 === ''): ?>
                        <?php print '' ?>
                        <?php else: ?>
                        <?php print "<li><a class='review-image' href='upload/$review->image4'><img src='upload/$review->image4'></a></li>" ?>
                        <?php endif; ?>
                    </ul>
                    <p class="review-content-date">更新日：<?= $review->created_at ?></p>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </section>
            
            <div class="review-btn">
                <a class="review-btn-home" href="index.php">ホーム画面へ戻る</a>
                <a class="review-btn-back" href="list.php?genre_name=<?= $place->genre_name ?>">一覧へ戻る</a>
            </div>
            </div>
            
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2qi6Rr9OTuGMClC8RSYlkDrHz_MeV3iM&callback=initMap"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="main.js"></script>
    </body>
</html>