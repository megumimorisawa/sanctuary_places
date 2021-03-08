-- MySQL dump 10.13  Distrib 5.5.62, for Linux (x86_64)
--
-- Host: localhost    Database: sanctuary_places
-- ------------------------------------------------------
-- Server version	5.5.62

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `favorites`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `place_id` (`place_id`),
  CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorites`
--

LOCK TABLES `favorites` WRITE;
/*!40000 ALTER TABLE `favorites` DISABLE KEYS */;
INSERT INTO `favorites` VALUES (2,5,6),(3,4,6),(4,3,6);
/*!40000 ALTER TABLE `favorites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `places`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `genre_name` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `introduction` varchar(300) NOT NULL,
  `address` varchar(200) NOT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `open_time` time DEFAULT NULL,
  `close_time` time DEFAULT NULL,
  `last_order` time DEFAULT NULL,
  `close_date` varchar(100) NOT NULL,
  `nearest_station` varchar(200) DEFAULT NULL,
  `booking` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `image1` varchar(100) NOT NULL,
  `image2` varchar(100) DEFAULT NULL,
  `image3` varchar(100) DEFAULT NULL,
  `image4` varchar(100) DEFAULT NULL,
  `image5` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `places_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `places`
--

LOCK TABLES `places` WRITE;
/*!40000 ALTER TABLE `places` DISABLE KEYS */;
INSERT INTO `places` VALUES (6,3,'BTS','ヒロマンズコーヒー（HIROMAN\'S COFFEE）','Huluのロケ「Sweets Party」で利用されたカフェです。\r\n原宿の裏通りにあって、インスタ映えするスイーツが楽しめます。','東京都渋谷区神宮前3-18-12','03-5775-5663','11:00:00','19:00:00','18:30:00','日曜営業','明治神宮前駅から482m','不明','¥0〜¥999','618304656603a43344807f8.86326023.png','78690213603a4334480f18.24505041.jpg','1001460051603a4334481143.42467782.jpg','436633940603a4334481315.94626176.png','718909299603a43344814d2.35065736.png','2021-02-27 13:03:48','0000-00-00 00:00:00'),(7,3,'BTS','東京油組総本店 広尾組','2017年にメンバーが広尾店に訪れた目撃情報がありました。\r\nまた、テテが東京タワーに行く前のケータリングで食べた時の写真もありました。\r\n油っぽさはそれほどなく抑えられているので、食べやすい油そばだと思います。','東京都渋谷区広尾5-3-12','03-3280-2511','11:00:00','04:00:00','00:00:00','日曜日は21:00まで　無休','東京メトロ日比谷線広尾駅徒歩3分\r\n広尾駅から162m','不要','¥0〜¥999','1565776763603a4bee572422.55122451.png','1106827976603a4bee5728f5.71486345.jpeg','547809489603a4bee572b06.35646420.jpeg','','','2021-02-27 13:41:02','0000-00-00 00:00:00'),(13,3,'BIGBANG','YG PLACE 明洞店','YGエンターテイメントが運営する公式グッズ店です。\r\nコンサート会場やインターネット通販でしか購入できなかったグッズをオフラインでも購入できるようになりました。','ソウル特別市 中区 南大門路 67 , 1F','02-2118-5107','11:00:00','21:30:00','00:00:00','不定休（月1回）1月1日、旧正月・秋夕(チュソク)の連休 ※ロッテヤングプラザと同じ','・地下鉄2号線乙支路入口(ウルチロイック、Euljiro1(il)-ga)駅 7番出口 徒歩3分\r\n・地下鉄4号線明洞(ミョンドン、Myeong-dong)駅 5番出口 徒10分','不要','¥3,000〜¥3,999','391775506603a541a3cc8c6.69391770.jpeg','1015517456603a541a3ccc71.30046512.jpeg','908359213603a541a3cce13.80176658.jpeg','','','2021-02-27 14:15:54','0000-00-00 00:00:00'),(14,3,'BIGBANG','カムナムチッ運転手食堂','BIGBANGが夜中にしばしば訪れる24時間営業の食堂です。\r\n日替わりのおかずやご飯がおかわり自由なのに価格が良心的なのが魅力です。','ソウル特別市 麻浦区 延南路 23','02-325-8727','00:00:00','00:00:00','00:00:00','年中無休','地下鉄2号線弘大入口(ホンデイック、Hongik Univ.)駅 3番出口 徒歩8分','不明','¥1,000〜¥1,999','1755721162603a571b1f17a1.77744053.jpg','578328067603a571b1f1d56.18796873.jpg','793043066603a571b1f2195.54642169.jpg','1310035756603a571b1f2424.32870384.jpg','1898223786603a571b1f25e3.04005716.jpg','2021-02-27 14:28:43','0000-00-00 00:00:00'),(15,4,'EXO','魔女キムパッ','海外からの旅行者にも大人気の韓国海苔巻き専門店です。\r\n芸能事務所が多く集まる清潭洞(チョンダムドン)にあり、過去にEXOが訪れています。','ソウル特別市 江南区 狎鴎亭路79キル 32','02-547-1114','08:00:00','21:00:00','20:00:00','旧正月・秋夕(チュソク)の連休','・地下鉄7号線清潭(チョンダム、Cheongdam)駅 9番出口 徒歩14分\r\n・地下鉄水仁・盆唐線狎鴎亭ロデオ(アックジョンロデオ、Apgujeongrodeo)駅 3番出口 徒歩14分','不明','¥0〜¥999','1422326971603c469a4ce092.03195429.jpg','1689674283603c469a4ce696.13671658.jpg','1167809219603c469a4ce8b6.55480764.jpg','1029859075603c469a4cea89.92909150.jpg','647060102603c469a4cec29.31691021.jpg','2021-03-01 01:42:50','0000-00-00 00:00:00'),(17,4,'EXO','COFIOCA（コピオカ）','人気のK-POPアイドルや芸能人も足繁く通うバブルティー(タピオカティー)専門店です。\r\nEXOファンのメッセージやEXOメンバーのサインがたくさん飾ってあります。','ソウル特別市 江南区 宣陵路161キル 31','02-515-3032','09:00:00','22:00:00','00:00:00','旧正月・秋夕(チュソク)の当日','・地下鉄水仁・盆唐線狎鴎亭ロデオ(アックジョンロデオ、Apgujeongrodeo)駅 6番出口 徒歩4分\r\n・地下鉄3号線狎鴎亭(アックジョン、Apgujeong)駅 2番出口 徒歩15分','不要','¥0〜¥999','437376404603c493c93f790.62151736.jpg','1642621510603c493c93fc46.85509573.jpg','401809619603c493c93fe88.48996795.jpg','473121409603c493c940031.45490984.jpg','','2021-03-01 01:54:04','0000-00-00 00:00:00'),(21,4,'GOT7','MARK LANE coffee（マクレインコピ）','V LIVE「GOT7のHARD CARRY」の最終話に登場するカフェです。\r\nバリスタが直接淹れてくれるハンドドリップとコールドブリューがとても有名です。\r\n','ソウル特別市 江南区 宣陵路157キル 23-5','02-516-5202','10:00:00','23:00:00','00:00:00','旧正月・秋夕(チュソク)の当日','','不要','¥0〜¥999','665583275603c524ed7f414.74501070.jpg','615214848603c524ed7f9c1.68664602.jpg','1561070010603c524ed7fbd2.85977222.jpg','1285893894603c524ed7fd91.41260563.jpg','923622876603c524ed7ff26.72638682.jpg','2021-03-01 02:32:46','0000-00-00 00:00:00'),(23,4,'GOT7','鷹峰山（ウンボンサン）','V LIVE「花ブロ」を通じて、ジャクソンがMONSTA Xのジュホンと一緒に夜間登山を行った場所です。標高94メートルと高くなく階段も整備されているので、軽装でも山頂まで到着できます。漢江を見下ろせる爽快な風景を見に、いざ登ってみましょう！（無料です！）','ソウル特別市 城東区 読書堂路60キル 13-1','02-2286-6061','00:00:00','00:00:00','00:00:00','無し','京義・中央線鷹峰(ウンボン、Eungbong)駅 1番出口 徒歩10分','不要','¥0〜¥999','1848018154603c566a9158a4.10200078.jpg','188379219603c566a915e63.21635412.jpg','1482704788603c566a916345.26160634.jpg','1742123205603c566a916547.58707376.jpg','1080550475603c566a9166e3.16698323.jpg','2021-03-01 02:50:18','0000-00-00 00:00:00'),(24,4,'IKON','PLATTE（プルレトゥ）','ジナン君のお姉さんが経営するカフェです。ジナン君に会えるかも？','ソウル特別市 麻浦区 ソンミ山路 105','02-338-4256','11:00:00','21:00:00','00:00:00','年中無休','','不要','¥0〜¥999','819658704603c7facb2d008.84437024.jpeg','1142775839603c7facb32414.08832939.jpg','','','','2021-03-01 05:46:20','0000-00-00 00:00:00'),(26,4,'IKON','つるとんたん　北新地本通','ライブ前にメンバー全員で訪れたつるとんたん。実際に利用した部屋は16名様用のため、少人数で使用する場合は相席になります。全室和室のため、寛ぐことができます。お昼の部11:00〜15:00(L.O. 14:00)　夜の部17:00〜21:00(L.O. 21:00)','大阪府大阪市北区曽根崎新地1-4-20 桜橋IMビル　Ｂ２Ｆ','050-5456-4400','11:00:00','15:00:00','14:00:00','無休','JR大阪駅 徒歩7分(560m)\r\nJR東西線 ／ 北新地駅 徒歩1分（80m）\r\n大阪メトロ四つ橋線 ／ 西梅田駅 徒歩1分（80m）\r\n大阪メトロ谷町線 ／ 東梅田駅 徒歩5分（400m）','不要','¥1,000〜¥1,999','1502934748603c84c2592ad1.69000369.jpeg','405173523603c84c2595b62.90570292.jpeg','584151098603c84c2595d97.30765697.jpeg','1936812622603c84c2595f61.76043966.jpeg','2000773052603c84c2598421.93299454.jpg','2021-03-01 06:08:02','0000-00-00 00:00:00'),(27,4,'MONSTA X','Humming Bella（ホミンベルラ）','V LIVE「MONSTA X-RAY」でアルバイト体験の時に訪れていたカフェ。インテリアやケーキも可愛くてとても美味しいです。日～木曜11：00～24：00、金～土曜11：00～翌2：00','ソウル特別市 麻浦区 トンマッ路7キル 57','02-324-7050','11:00:00','00:00:00','00:00:00','年中無休','','必要','¥0〜¥999','733269083603c88ee30fda1.02814717.jpg','1124242570603c88ee310328.09774571.png','1270907513603c88ee310521.16003432.png','','','2021-03-01 06:25:50','0000-00-00 00:00:00'),(29,4,'MONSTA X','イモガインヌンチッ 本店','2016年、放送した[イケメンブロマンス]第2話でジュホンが子供のごろから家族と行っていると言っていたお店です。この店にはMONSTA Xのほか、多くの芸能人やスポーツ選手が訪れ、店の壁には彼らのサインでぎっしり埋まっています。','ソウル特別市 江南区 論峴洞 113-12','02-545-7605','11:00:00','21:30:00','21:00:00','日曜','','不明','¥0〜¥999','358067833603c8c0f447282.47598044.jpg','956553266603c8c0f447745.97277621.jpg','1120704319603c8c0f447937.25585272.jpg','1152079681603c8c0f447af4.00610584.jpg','1495294204603c8c0f447c81.08542820.jpg','2021-03-01 06:39:11','0000-00-00 00:00:00'),(30,4,'SEVENTEEN','一蘭　六本木店','2017年7月13日のサイン会の前にメンバー全員で訪れていました。別の日には、ジョシュアとホシの2人で、夜中の12時過ぎに一蘭に行ってました。','東京都港区六本木4-11-11 六本木ＧＭビル　２Ｆ','03-3796-7281','11:00:00','22:00:00','00:00:00','年中無休','・東京メトロ日比谷線　六本木駅（4a番出口）　徒歩2分\r\n・都営大江戸線　六本木駅（7番出口）　徒歩2分','不要','¥1,000〜¥1,999','934316067603c8f3b5ffce2.16581824.jpg','879761247603c8f3b600256.72039859.jpeg','363434371603c8f3b6004a4.60431407.jpeg','','','2021-03-01 06:52:43','0000-00-00 00:00:00'),(31,4,'SEVENTEEN','つるとんたん 六本木店','2018年10月20日にAbemaTVで放送された日本語学習バスツアーin東京でランチに訪れていました。カレーのおうどんが一番人気だったみたいです。こちらのお店は並んでいることが多いので行かれるときは予約することをおすすめします！','東京都港区六本木3-14-12 六本木3丁目ビル 1F','03-5786-2626','11:00:00','20:00:00','19:00:00','無し','六本木駅から徒歩3分','不要','¥1,000〜¥1,999','370256143603c910165f689.50742615.jpeg','666659899603c910165fc06.94740022.jpeg','1849515163603c910165fdc5.11560101.jpg','953812704603c910165ff96.32122033.jpeg','1737751627603c9101660135.42932839.jpeg','2021-03-01 07:00:17','0000-00-00 00:00:00'),(32,4,'SHINee','兄夫食堂 赤坂店','2014年にSHINeeテミンが主演で出演したミュージカル「宮」。赤坂ACTシアターで行われた公演の打ち上げで訪れたお店です。韓国料理のお店で、ミュージカル共演者の皆と映るテミンが訪れたのは店内4階フロアとのことです。','東京都港区赤坂2-13-17 シントミ第２ビル','050-5592-7846','10:00:00','05:00:00','04:30:00','無し','・千代田線　赤坂駅２番出口を出て右へ（徒歩2分）\r\n・丸ノ内線　赤坂見附駅１０番出口を出てみすじ通りを左へ（徒歩5分）\r\n・銀座線　 溜池山王駅１０番出口（徒歩5分）','不明','¥4,000〜¥4,999','536458458603c92d48c9418.32821321.jpg','1851683270603c92d48c99a7.46918561.jpeg','373912913603c92d48c9ba9.88514832.jpeg','101715956603c92d48c9d57.32791942.jpeg','','2021-03-01 07:08:04','0000-00-00 00:00:00'),(33,4,'SHINee','麺匠 竹虎 六本木店','2015年にSHINeeがプライベートで訪れた東京の行きつけのお店です。個室とカウンターの席が用意されており、SHINee全員は個室でラーメンを食べていたようです。','東京都港区六本木3-14-14 六本木314ビル 1F','050-5571-7712','11:00:00','09:00:00','00:00:00','年中無休','・都営大江戸線六本木駅A５出口より徒歩3分\r\n・東京メトロ日比谷線六本木駅(六本木交差点)から徒歩2分。','不要','¥0〜¥999','459811938603c94755bff45.00422599.jpeg','1680736964603c94755c04c3.10427649.jpeg','','','','2021-03-01 07:15:01','0000-00-00 00:00:00'),(35,4,'SUPER JUNIOR','haru＆oneday（ハルエンウォンデイ）','SUPER JUNIORのドンヘの家族が運営するカフェで、ドンヘ本人やメンバーのヒチョルも店舗を訪れました。店内ではタンブラーやスマートフォンケースなどカフェでしか買えない限定グッズも販売しています。','ソウル特別市 城東区 峨嵯山路 92','02-499-9303','08:00:00','23:00:00','00:00:00','年中無休','・地下鉄2号線聖水(ソンス、Seongsu)駅 4番出口 徒歩1分\r\n・地下鉄2号線トゥッソム(トゥッソム、Ttukseom)駅 5番出口 徒歩7分','不要','¥0〜¥999','318298507603c96f469c5f5.34693582.jpg','340967909603c96f469ca88.87764292.jpg','1318783389603c96f469cc96.97380145.jpg','181052777603c96f469ce66.67484170.jpg','1959876306603c96f469cff5.24145350.jpg','2021-03-01 07:25:40','0000-00-00 00:00:00'),(36,4,'SUPER JUNIOR','タグロ家','2000年にオープンして以降、今なお人気のタッカルビ(鶏の鉄板炒め)の専門店です。SUPER JUNIOR(スーパージュニア)も常連として知られています。','ソウル特別市 江南区 彦州路172キル 55','02-518-9936','12:00:00','23:30:00','22:30:00','旧正月・秋夕(チュソク)の当日','地下鉄水仁・盆唐線狎鴎亭ロデオ(アックジョンロデオ、Apgujeongrodeo)駅 5番出口 徒歩3分','不要','¥2,000〜¥2,999','2127710145603c9844480225.05640244.jpg','2111456521603c98444806b1.78836521.jpg','294341298603c98444808b3.99377367.jpg','1452424126603c9844480a75.50541385.jpg','835757889603c9844480c04.89847984.jpg','2021-03-01 07:31:16','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `places` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(300) NOT NULL,
  `image1` varchar(100) DEFAULT NULL,
  `image2` varchar(100) DEFAULT NULL,
  `image3` varchar(100) DEFAULT NULL,
  `image4` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `place_id` (`place_id`),
  CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,3,6,4,'初めまして','特に混んでいなくて、ゆったりできました！','','','','','2021-02-28 23:18:05'),(2,4,6,5,'コスパも店内の可愛さも最高でした！','デザートとドリンクが美味しかったです！','','','','','2021-02-28 23:30:12'),(3,5,6,4,'こんにちは','来月行くので楽しみです','1274850176603c2c7c5af4c5.35825091.jpg','2117151169603c2c7c5afa80.60556707.jpg','','','2021-02-28 23:51:24');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `birthday` varchar(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `self_introduction` varchar(300) DEFAULT NULL,
  `favorite_person` varchar(100) DEFAULT NULL,
  `favorite_place` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'美里','araki112318@gmail.com','aaaaaa','19921123','19028726806038e0b052d798.20330157.jpg','こんにちは','',NULL,'2021-02-16 00:14:47','0000-00-00 00:00:00'),(4,'建太','rnt8@ezweb.ne.jp','aaaaaa','19921122','183967399603c27c6db3947.84516923.png','バンタン歴5年目','ジミン',NULL,'2021-02-16 01:52:07','0000-00-00 00:00:00'),(5,'メグミ','araki@gmail.com','aaaaaa','33333333','1788945408602b5940065cf2.17347578.jpg',NULL,NULL,NULL,'2021-02-16 05:33:52','0000-00-00 00:00:00'),(6,'のぞみ','nozomi@gmail.com','aaaaaa','11111111','195578811960324f0b247be4.24987314.jpg','','テソンくん',NULL,'2021-02-21 11:27:29','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-04  4:37:55
