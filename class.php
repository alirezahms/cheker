<?PHP
/*

اوپن شد در کانال آیرا تیم کپی بدون ذکر منبع پیگرد ناموسی خواهد داشت

@IRA_Team | @ImDevAbolfazl

*/
class TelBot{
    public function __construct($api_key){
        $this->token = $api_key;
    }
    public function Bot($method,$args=[]){
        $url = 'https://api.telegram.org/bot'.$this->token.'/'.$method;
        $ch = curl_init();
        curl_setopt($ch , CURLOPT_URL , $url);
        curl_setopt($ch , CURLOPT_POST , 1);
        curl_setopt($ch , CURLOPT_POSTFIELDS , $args);
        curl_setopt($ch , CURLOPT_RETURNTRANSFER , 1);
        return json_decode(curl_exec($ch),1);
        curl_close($ch);
    }
    public function SendMessage($chat_id, $text, $message_id, $parse='HTML', $dis=true, $keyboard=null){
    	$this->Bot('SendMessage',[
        'chat_id'=> $chat_id,
        'text'=> $text,
        'reply_to_message_id'=> $message_id,
        'parse_mode'=> $parse,
        'disable_web_page_preview'=> $dis,
        'reply_markup'=> $keyboard
        ]);
    }
        public function DeleteMessage($chat_id, $messageid){
    	$this->Bot('deletemessage', [
'chat_id' => $chat_id, 
'message_id' => $messageid,
        ]);
    }
    public function forwardMessage($chat_id, $from, $message_id){
    	$this->Bot('forwardMessage',[
        'chat_id'=> $chat_id,
        'from_chat_id'=> $from,
        'message_id'=> $message_id
        ]);
    }
    public function is_admin($from_id){
    	global $sudo;
        return in_array($from_id, $sudo);
    }
    public function set($data){
    	global $from_id;
    	$get = json_decode(file_get_contents("data/$from_id.json"),true);
        $get['set'] = $data;
        file_put_contents("data/$from_id.json", json_encode($get));
        return true;
   }
   public function get(){
       global $from_id;
       $get = json_decode(file_get_contents("data/$from_id.json"),true);
       return $get['set'];
   }
      public function textstart($str){
       file_put_contents("data/mtnstart.txt",$str);
       return true;
   }
  public function save($data, $dir){
       $f = fopen("media/$dir","a") or die("Error to open file!");
       fwrite($f, "$data,");
       fclose($f);
  }
  public function ping($host, $port, $timeout){ 
    $tB = microtime(true); 
    $fP = fSockOpen($host, $port, $errno, $errstr, $timeout); 
    if (!$fP) {
        return "This HostName Is Down";
    } 
    $tA = microtime(true); 
    return round((($tA - $tB) * 1000), 0)." ms";
}
}
/*

اوپن شد در کانال آیرا تیم کپی بدون ذکر منبع پیگرد ناموسی خواهد داشت

@IRA_Team | @ImDevAbolfazl

*/
?>