<?PHP
/*

اوپن شد در کانال آیرا تیم کپی بدون ذکر منبع پیگرد ناموسی خواهد داشت

@IRA_Team | @ImDevAbolfazl

*/
error_reporting(0);
#=============#
require 'class.php';
#=============#
$args = '5681143991:AAFpruLaoXDq4YLTCUjEuzSHgHoOYf_OPwA'; //توکن ربات
$sudo = ['277826937']; // عددی ادمین
#=============#
$bot = new TelBot($args);
#=============#
$update = json_decode(file_get_contents('php://input'),true);
if(isset($update['message'])){
    $message = $update['message'];
    $chat_id = $message['chat']['id'];
    $message_id = $message['message_id'];
    $text = $message['text'];
    $from_id = $message['from']['id'];
}
#=============#
$db = file_get_contents(json_decode('data.json',true));
$getfile = file_get_contents("data/mtnstart.txt");
$answer = "متن استارت تنظیم نشده است...";
$mtnstart = $getfile?$getfile:$answer;
#=============#
$keyHome_admin = json_encode([
      'keyboard'=> [
      [['text'=>'👤پنل مدیریت👤']],
      ],'resize_keyboard'=> true
]);
$keyPanel = json_encode([
      'keyboard'=> [
      [['text'=> 'آمار']],
      [['text'=> 'فروارد'],['text'=> 'پیام']],
      [['text'=>'🔙'],['text'=>'تنظیم متن استارت']],
      ],'resize_keyboard'=> true
]);
$keyBack = json_encode([
      'keyboard'=> [
      [['text'=> 'بازگشت']]
      ],'resize_keyboard'=> true
]);
$keyRemove = json_encode([
      'ReplyKeyboardRemove'=>[
       []
      ],'remove_keyboard'=> true
]);
/*

اوپن شد در کانال آیرا تیم کپی بدون ذکر منبع پیگرد ناموسی خواهد داشت

@IRA_Team | @ImDevAbolfazl

*/
?>