<?php
/*

اوپن شد در کانال آیرا تیم کپی بدون ذکر منبع پیگرد ناموسی خواهد داشت

@IRA_Team | @ImDevAbolfazl

*/
require 'config.php'; 
require 'jdf.php';
#=======================#
if(!file_exists("data/$from_id.json")){
	touch("data/$from_id.json");
}
#=======================#
if($text == "/start" || $text =='🔙'){
if(!in_array($from_id,$sudo)){
	$answer = $mtnstart;
	$bot->SendMessage($chat_id, $answer, $message_id, 'HTML', true);
}else{
	$answer = $mtnstart;
    $bot->SendMessage($chat_id, $answer, $message_id, 'HTML', true, $keyHome_admin);
}
}
/*

اوپن شد در کانال آیرا تیم کپی بدون ذکر منبع پیگرد ناموسی خواهد داشت

@IRA_Team | @ImDevAbolfazl

*/
if(isset($text) and strstr($text,'vmess') or strstr($text,'vless')){
if(strstr($text,'vmess')){
$decode = base64_decode(explode('://',$text)[1]);
$decodejs = json_decode($decode,1);
$name = $decodejs['ps'];
$type = 'vmess';
$host = $decodejs['add'];
$port = $decodejs['port'];
$id = $decodejs['id'];
$ping  = $bot->ping($host, $port, 10);
}
if(strstr($text,'vless')){
$ex1 = explode('://',$text)[1];
$id = explode('@',$ex1)[0];
$host = explode(':',explode('@',$ex1)[1])[0];
$port = explode('?',explode(':',explode('@',$ex1)[1])[1])[0];
$name = explode('#',$ex1)[1];
$type  = 'vless';
$ping  = $bot->ping($host, $port, 10);
}
$answer = "
📍 id : `$id`
🔰 name : `$name`
🔘 type : `$type`
🌐 domain : `$host`
📌 port : **$port**
〽️ ping : **$ping**
";
$bot->SendMessage($chat_id, $answer, $message_id, 'markDown', true);
}
#=======================#
elseif($text == '👤پنل مدیریت👤'  && $bot->is_admin($from_id)){
$answer = '🗿 به پنل مدیریت خوش آمدید';
$bot->SendMessage($chat_id, $answer, $message_id, 'HTML', true, $keyPanel);
$bot->set('Off');
}
#=======================#
elseif($text == 'آمار' && $bot->is_admin($from_id)){
    $counts = count(scandir('data/')) - 2;
    $time = jdate('آخرین بروزرسانی در ساعت H:i:s روز l انجام شد.');   
	$answer = "
	آمار کاربران ربات <b>$counts</b> نفر میباشد
$time
";
	$bot->SendMessage($chat_id, $answer, $message_id, 'HTML', true);
}
#=======================#
elseif($text == 'تنظیم متن استارت' && $bot->is_admin($from_id)){
    $answer = ' ‌لطفا متن استارت را وارد کنید :';
    $bot->SendMessage($chat_id, $answer, $message_id, 'HTML', true, $keyBack);
    $bot->set('settxtstart');
}
elseif($bot->get() == 'settxtstart'){
		$answer = 'متن استارت تنظیم شد !';
		$bot->set('Off');
		$bot->textstart($text);
        $bot->SendMessage($chat_id, $answer, $message_id, 'HTML', true, $keyPanel);
}
#=======================#
elseif($text == 'پیام' && $bot->is_admin($from_id)){
    $answer = 'لطفا پیام خود را وارد کنید تا برای کاربران ارسال گردد';
    $bot->SendMessage($chat_id, $answer, $message_id, 'HTML', true, $keyBack);
    $bot->set('SendUser');
}
elseif($bot->get() == 'SendUser' && isset($text)){
    foreach(glob('data/*') as $value){
       $user = pathinfo($value)['filename'];
       $bot->SendMessage($user, $text,null, 'HTML', true);
    }
   $answer = "پیام شما ارسال شد.";
   $bot->SendMessage($chat_id, $answer, $message_id, 'HTML', true, $keyPanel);    
   $bot->set('Off');
}
#=======================#
elseif($text == 'فروارد' && $bot->is_admin($from_id)){
    $answer = 'لطفا پیام خود را فروارد یا ارسال کنید تا برای کاربران ارسال گردد';
    $bot->SendMessage($chat_id, $answer, $message_id, 'HTML', true, $keyBack);
    $bot->set('ForUser');
}
elseif($bot->get() == 'ForUser'){
    foreach(glob('data/*') as $value){
       $user = pathinfo($value)['filename'];
       $bot->forwardMessage($user, $chat_id,$message_id);
    }
   $answer = "پیام شما ارسال شد.";
   $bot->SendMessage($chat_id, $answer, $message_id, 'HTML', true, $keyPanel);    
   $bot->set('Off');
}
/*

اوپن شد در کانال آیرا تیم کپی بدون ذکر منبع پیگرد ناموسی خواهد داشت

@IRA_Team | @ImDevAbolfazl

*/
?>