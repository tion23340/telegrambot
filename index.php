<?php 

$userID = "5027607388";
$botToken = "6682366412:AAEtnstFxx6yT0FZx3Gsp2feltQ26zXcnz4";


function sendMessage($method, $datas = []){
    global $botToken;
    $curl = curl_init("https://api.telegram.org/bot" . $botToken . "/" . $method);
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => $datas,
        CURLOPT_CUSTOMREQUEST => "POST"
    ]); 

    $response = json_decode(curl_exec($curl));
    return $response;
}

$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
$text = $message->text;  
$chat_id = $message->chat->id;


if($text == "/accept"){
    sendMessage('sendMessage', ['chat_id' =>$chat_id , 'text' => "$chat_id"]);
}

