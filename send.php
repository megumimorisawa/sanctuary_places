<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // お問い合わせ日時
    $request_datetime = date("Y年m月d日 H時i分s秒");
 
    //自動返信メール
    $mailto = $_POST['email'];
    $to = "araki112318@gmail.com"; 
    $mailfrom = "From:" . $to; 
    $subject = "お問い合わせ有難うございます。";
 
    $content = "";
    $content .= $name . " 様\r\n";
    $content .= "お問い合わせ有難うございます。\r\n";
    $content .= "お問い合わせ内容は下記通りでございます。\r\n";
    $content .= "=================================\r\n";
    $content .= "お名前	      " . htmlspecialchars($name) . "\r\n";
    $content .= "メールアドレス   " . htmlspecialchars($email) . "\r\n";
    $content .= "お問い合わせ内容   " . htmlspecialchars($message) . "\r\n";
    $content .= "お問い合わせ日時   " . $request_datetime . "\r\n";
    $content .= "=================================\r\n";
 
    //管理者確認用メール
    $subject2 = $name . " 様よりお問い合わせがありました。";
    $content2 = "";
    $content2 .= $name . " 様よりお問い合わせがありました。\r\n";
    $content2 .= "お問い合わせ内容は下記通りです。\r\n";
    $content2 .= "=================================\r\n";
    $content2 .= "お名前	      " . htmlspecialchars($name) . "\r\n";
    $content2 .= "メールアドレス   " . htmlspecialchars($email) . "\r\n";
    $content2 .= "タイトル   " . htmlspecialchars($title) . "\r\n";
    $content2 .= "内容   " . htmlspecialchars($message) . "\r\n";
    $content2 .= "お問い合わせ日時   " . $request_datetime . "\r\n";
    $content2 .= "================================="."\r\n";
     
    mb_language("ja");
    mb_internal_encoding("UTF-8");
    
    //mail 送信
    if(mb_send_mail($to, $subject2, $content2, $mailfrom)){
        mb_send_mail($mailto, $subject, $content, $mailfrom);
    }
    header('Location: index.php');
    exit;