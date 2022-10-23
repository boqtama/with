<?php

$name = $_POST['name'];
$phone = $_POST['mobile'];
$adres = $_POST['adres'];
$service = $_POST['services'];
$services_second = $_POST['services-second']; 
$services_third = $_POST['services-third']; 
$comment = $_POST['comments'];

if(empty($name) || empty($phone) || empty($adres)) {
    header('location: /html/order.html');
} else {
    $token = "5745582622:AAG17RRwTJX3Mm68X9Ksi-ZPKDQkESZJ624";
    $chat_id = "-855245143";
    $arr = array(
        'Имя пользователя: ' => $name,
        'Телефон: ' => $phone,
        'Адрес: ' => $adres,
        'Услуга: ' => $service,
        'Доп услуга: ' => $services_second,
        'Доп услуга_3: ' => $services_third,
        'Комментарии: ' => $comment
    );

    foreach($arr as $key => $value) {
        $txt .= "<b>".$key."</b> ".$value."%0A";
    }

    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");


    if($sendToTelegram) {
        header('location: /html/success.html');
    }
} 

?>