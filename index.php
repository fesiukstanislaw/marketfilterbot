<?php

include 'vendor/autoload.php';

include 'TelegramBot.php';

$telegramApi = new TelegramBot();

while (true) {
    sleep(2);

    $updates = $telegramApi->getUpdates();

if(!empty($updates)){
    

foreach ($updates as $update) 
{
    $text = $update->message->text;

    $words = explode(" ", $text);

    if (in_array("Флуо", $words) == true || in_array("флуо", $words) == true) {
        $telegramApi->sendMessage($update->message->chat->id, 'Кто сказал флуо? Позовите @vladcamoeoxyennoeimya');
    } elseif (in_array("Аптека", $words) == true || in_array("аптека", $words) == true || in_array("аптечный", $words) == true || in_array("Аптечный", $words) == true || in_array("аптечный?", $words) == true || in_array("аптечный!", $words) == true){
        $telegramApi->sendMessage($update->message->chat->id, 'Запомните твари, @vladcamoeoxyennoeimya аптечный!');
    }

    if (in_array("Хуй", $words) == true || in_array("хуй", $words) == true || in_array("нахуй", $words) == true) {
        if(rand(0,5) == 3){
        $telegramApi->replyMessage($update->message->chat->id, 'Базар фильтруй', $update->message->message_id);
        }
    } elseif (in_array("Стас", $words) == true || in_array("стас", $words) == true){
        if(rand(0,10) == 7)
        $telegramApi->sendMessage($update->message->chat->id, 'Тебе запрещено писать это имя, черт галимый)', $update->message->message_id);
    }


    print_r($update);
}
}
}

?>