<?php
ob_start();
define('API_KEY','1708212263:AAE6oXo40tPacp3n44x02R4ofsVw06SbNtI');
$admin = "833935652";
$kanal = "@PHP_web_dasturlash";
$hamkor = "@Fair_GamerS";
  function del($nomi){
      array_map('unlink',glob("$nomi"));
}

function ty($ch){ 
   return bot('sendChatAction', [
   'chat_id' => $chat,
   'action' => 'typing',
   ]);
   }

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$mid = $message->message_id;
$cid = $message->chat->id;


$tx = $message->text;
$name = $message->chat->first_name;
$user = $message->from->username;
$phone = $message->from->phone_number;

if ($tx == "/start"){
bot ("sendMessage", [
'chat_id'=> $cid ,
'text'=>"Salom hurmatli $name bu bot sizga quyidagi funksiylari bilan sizga yordam bera oladi!\n/men - O'zingizni idingizni bilish uchun! \n/kanal - Bizning kanallar!\n/news - yangiliklar!",
'parse_mode'=>'html',
]);
}

if ($tx == "/admin" and $cid == $admin){
bot ("sendMessage", [
'chat_id'=> $cid ,
'text'=>"Keling Admin aka xush kelibsiz!\nBarmoqlaringizga XasanotðŸ˜‚ðŸ˜."
]);
}

if ($tx == "/men"){
bot("sendMessage", [
'chat_id'=>$cid ,
'text'=>"Salom ! \n\nSizning id : $cid\n\nSizning useringiz : @$user\n\nSizning ismingiz : $name",
'parse_mode'=>'html'
]);
}
If ($tx == "/news"){
Bot ("sendMessage", [
'chat_id'=> $cid ,
'text'=>"Hozircha yangiliklar yo'q bizdan uzoqlashmang!ðŸ˜Š"
]);
}
If ($tx == "/kanal"){
Bot ("sendMessage", [
'chat_id'=> $cid ,
'text'=>"Bizni kanallarimiz ko'p emas!ðŸ˜Š.\n$kanal\n$hamkor"
]);
}
?>
