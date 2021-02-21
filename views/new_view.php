<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap">
        <link rel="stylesheet" href="css/new.css">
        <title>見つけた聖地を登録しよう</title>
    </head>
    <body>
        <div class="new">
            <section class="header">
                <div class="header-inner">
                    <img src="css/image/logo.png" alt="ロゴ画像">
                    <ul>
                        <li><a href="profile.php?id=<?= $login_user->id ?>">マイページ</a></li>
                        <li><a href="contact.php">お問い合わせ</a></li>
                        <li><a href="logout.php">ログアウト</a></li>
                    </ul>
                </div>
            </section>
            <section class="top">
                    <h1>新しい聖地発見！</h1>
            </section>
            <div class="new-inner">
                <section class="error">
                    <?php if($errors !== null): ?>
                    <ul>
                        <?php foreach($errors as $error): ?>
                        <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </section>
                
                <section class="form">
                    <form action="create.php" method="POST" enctype="multipart/form-data">
                        <p class="form-name">グループ名・ドラマ名</p>
                        <div class="form-input"><select name="genre_name" style="height:27px">
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
                        <p class="form-name">場所の名称</p>
                        <div class="form-input"><input type="text" name="name" placeholder="例） バンタン食堂" style="height:27px"></div>
                        <p class="form-name">紹介文</p>
                        <div class="form-input"><textarea type="text" name="introduction" placeholder="例） メンバーの写真がたくさんありました。ご飯もおいしかったです。" style="width:90%" rows="10"></textarea></div>
                        <p class="form-name">郵便番号<span class="any">&emsp;※任意</span></p>
                        <div class="form-input"><input type="text" name="postal_code" autocomplete="postal-code" placeholder="例） 111-1111" style="height:27px"></div>
                        <p class="form-name">住所</p>
                        <div class="form-input"><input type="text" name="address" autocomplete="address-level1" placeholder="例） ソウル特別市江南区島山大路28キル14" style="height:27px;width:80%"></div>
                        <p class="form-name">電話番号&emsp;<span class="any">※任意</span></p>
                        <div class="form-input"><input type="text" name="tel" autocomplete="tel" placeholder="例） 000-1234-5678" style="height:27px"></div>
                        <p class="form-name">営業時間&emsp;<span class="any">※任意</span></p>
                        <div class="form-input">開始&emsp;<input type="time" name="open_time" style="height:27px"></div>
                        <div class="form-input">終了&emsp;<input type="time" name="close_time" style="height:27px"></div>
                        <p class="form-name">定休日</p>
                        <div class="form-input"><input type="text" name="close_date" placeholder="例） 年中無休" style="height:27px"></div>
                        <p class="form-name">最寄駅（徒歩何分かも分かれば）&emsp;<span class="any">※任意</span></p>
                        <div class="form-input"><textarea type="text" name="nearest_station" placeholder="例） 地下鉄3号線新沙(シンサ、Sinsa)駅 1番出口 徒歩12分" row="2" style="width:70%"></textarea></div>
                        <p class="form-name">予約可否&emsp;<span class="any">※任意</span></p>
                        <div class="form-input"><select name="booking" style="height:27px;width:20%">
                            <option value="必要">必要</option>
                            <option value="不要">不要</option>
                        </select></div>
                        <p class="form-name">価格帯&emsp;<span class="any">※任意</span></p>
                        <div class="form-input"><select name="price" style="height:27px">
                            <option value="¥0〜¥999">¥0〜¥999</option>
                            <option value="¥1,000〜¥1,999">¥1,000〜¥1,999</option>
                            <option value="¥2,000〜¥2,999">¥2,000〜¥2,999</option>
                            <option value="¥3,000〜¥3,999">¥3,000〜¥3,999</option>
                            <option value="¥4,000〜¥4,999">¥4,000〜¥4,999</option>
                            <option value="¥5,000〜¥5,999">¥5,000〜¥5,999</option>
                            <option value="¥6,000〜¥6,999">¥6,000〜¥6,999</option>
                            <option value="¥7,000〜¥7,999">¥7,000〜¥7,999</option>
                            <option value="¥8,000〜¥8,999">¥8,000〜¥8,999</option>
                            <option value="¥9,000〜¥9,999">¥9,000〜¥9,999</option>
                            <option value="¥10,000以上">¥10,000以上</option>
                        </select></div>
                        
                        <p class="form-name">写真&emsp;<span class="must">※一枚は必須</span></p>
                        <div class="form-input"><input type="file" name="image1" style="height:27px"></div>
                        <div class="form-input"><input type="file" name="image2" style="height:27px"></div>
                        <div class="form-input"><input type="file" name="image3" style="height:27px"></div>
                        <div class="form-input"><input type="file" name="image4" style="height:27px"></div>
                        <div class="form-input"><input type="file" name="image5" style="height:27px"></div><br/>
                        
                        <div class="form-btn">
                            <input class="form-btn-entry" type="submit" value="登録"><br/>
                            <input class="form-btn-back" type="button" onclick="history.back()" value="戻る">
                        </div>
                    </form>
                    
                </section>
                
            </div>
            
        </div>
        
    </body>
</html>