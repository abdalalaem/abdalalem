<?php 
ob_start();
$marcus = '877825015:AAGFD02xvGnjazzum7AESEyQuxecv72gr3E';
define('API_KEY',$marcus);
echo file_get_contents("https://api.telegram.org/bot" . API_KEY . "/setwebhook?url=" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
function bot($method,$datas=[]){
$marcus4 = http_build_query($datas);
$url = "https://api.telegram.org/bot".API_KEY."/".$method."?$marcus4";
$marcus4 = file_get_contents($url);
return json_decode($marcus4);
}

$update = json_decode(file_get_contents('php://input'));
if(isset($update->message)){
    $message = $update->message;
    $text = $message->text;
    $chat_id = $message->chat->id;
    $from_id = $message->from->id;
    $message_id = $message->message_id;
    $first_name = $message->from->first_name;
    $username = $message->from->username;
}
if(isset($update->channel_post)){
    $chid           = $update->channel_post->chat->id;
    $chtext         = $update->channel_post->text;
    $messageid      = $update->channel_post->message_id;
    $document       = $update->channel_post->document;
    $sticker        = $update->channel_post->sticker;
    $photo          = $update->channel_post->photo;
    $video          = $update->channel_post->video;
    $forward        = $update->channel_post->forward_from_chat;
    $contact        = $update->channel_post->contact;
    $audio          = $update->channel_post->audio;
}

$documents = "المتحركة";
$stickers = "الملصقات";
$photos = "الصور";
$videos = "الفيديو";
$forwards = "التوجيه";
$contacts = "المواقع";
$audios = "الصوت";
$links = "الروابط";
$usernames = "المعرفات";
$channel = "@Bots_Syria";
$json_security_channels = json_decode(file_get_contents("data/$chid.json"),true);
if($json_security_channels["lock"]["document"] == "close"){
if(isset($document )){  
bot('deletemessage',[
    'chat_id'=>$chid,
    'message_id'=>$messageid
    ]);
  }
  }
if($json_security_channels["lock"]["sticker"] == "close"){
if(isset($sticker )){  
bot('deletemessage',[
    'chat_id'=>$chid,
    'message_id'=>$messageid
    ]);
  }
  }
if($json_security_channels["lock"]["photo"] == "close"){
if(isset($photo )){  
bot('deletemessage',[
    'chat_id'=>$chid,
    'message_id'=>$messageid
    ]);
  }
  }
if($json_security_channels["lock"]["video"] == "close"){
if(isset($video )){  
bot('deletemessage',[
    'chat_id'=>$chid,
    'message_id'=>$messageid
    ]);
  }
  }
if($json_security_channels["lock"]["forward"] == "close"){
if(isset($forward )){  
bot('deletemessage',[
    'chat_id'=>$chid,
    'message_id'=>$messageid
    ]);
  }
  }
if($json_security_channels["lock"]["contact"] == "close"){
if(isset($contact )){  
bot('deletemessage',[
    'chat_id'=>$chid,
    'message_id'=>$messageid
    ]);
  }
  }
if($json_security_channels["lock"]["audio"] == "close"){
if(isset($audio )){  
bot('deletemessage',[
    'chat_id'=>$chid,
    'message_id'=>$messageid
    ]);
  }
  }
if($json_security_channels["lock"]["link"] == "close"){
if (strstr($text ,"t.me") == true or strstr($text ,"telegram.me") == true or strstr($caption,"t.me") == true or strstr($caption,"telegram.me" ) == true or strstr($text ,"T.me") == true or strstr($text ,"T.Me") == true or strstr($caption,"T.ME") == true or strstr($caption,"Telegram.me" )== true or strstr($text ,"://") == true or strstr($text ,".com") == true or strstr($caption,"www.") == true or strstr($caption,".org" ) == true or strstr($text ,".online") == true or strstr($text ,".net") == true or strstr($caption,".ml") == true or strstr($caption,".cf" )) {   
bot('deletemessage',[
    'chat_id'=>$chid,
    'message_id'=>$messageid
    ]);
  }
  }
if($json_security_channels["lock"]["username"] == "close"){
if (strstr($text ,"@") == true or strstr($caption,"@") == true) {
bot('deletemessage',[
    'chat_id'=>$chid,
    'message_id'=>$messageid
    ]);
  }
  }
  if( $chtext == "تفعيل" ){
        mkdir ("data");
        $json_security_channels = '{"lock": {"document": "open" "username": "open" "photo": "open" "link": "open" "video": "open" "forward": "open" "contact": "open" "audio": "open" "sticker": "open"},}';
        $json_security_channels = json_decode($json_security_channels,true);
        $json_security_channels = json_encode($json_security_channels,true);
        file_put_contents("data/$chid.json",$json_security_channels);
	    bot('sendmessage',[
	    'chat_id'=>$chid,
	    'text'=>"
☑️ ¦ تم تفعيل البوت في القناة
📡 ¦ ايدي القناة `$chid`
",'parse_mode'=>"markdown",
        'reply_to_message_id'=>$messageid,
        ]);
        }
        


if(preg_match('/^(مسح) (.*)/', $chtext, $delete)){
       for($m=$messageid; $m>=$messageid-$delete[2]; $m--){
       bot('deletemessage',[
       'chat_id' => $chid,
       'message_id' =>$m,]);
       }
       bot('sendmessage',[
       'chat_id' => $chid,
       'text' =>"✅ ¦ تم *$chtext* من رسائل المنشورات",'parse_mode'=>"markdown",
       ]);
       }
# @Bota_Syria #
if($chtext =="قفل الصور" ){
$json_security_channels["lock"]["photo"]="close";
$json_security_channels = json_encode($json_security_channels,true);
file_put_contents("data/$chid.json",$json_security_channels);
	bot('sendmessage',[
	'chat_id'=>$chid,
	'text'=>"🔐 ¦ تم قفل $photos بنجاح ؛ \n📡 ¦ قناة المطور $channel\n√",
  'reply_to_message_id'=>$messageid,
 ]);
}

# @Bota_Syria #
if($chtext =="فتح الصور" ){
$json_security_channels["lock"]["photo"]="open";
$json_security_channels = json_encode($json_security_channels,true);
file_put_contents("data/$chid.json",$json_security_channels);
	bot('sendmessage',[
	'chat_id'=>$chid,
	'text'=>"🔓 ¦ تم فتح $photos بنجاح ؛ \n📡 ¦ قناة المطور $channel\n√",
  'reply_to_message_id'=>$messageid,
 ]);
}

# @Bota_Syria #
if($chtext =="قفل الفيديو" ){
$json_security_channels["lock"]["video"]="close";
$json_security_channels = json_encode($json_security_channels,true);
file_put_contents("data/$chid.json",$json_security_channels);
	bot('sendmessage',[
	'chat_id'=>$chid,
	'text'=>"🔐 ¦ تم قفل $videos بنجاح ؛ \n📡 ¦ قناة المطور $channel\n√",
  'reply_to_message_id'=>$messageid,
 ]);
}

# @Bota_Syria #
if($chtext =="فتح الفيديو" ){
$json_security_channels["lock"]["video"]="open";
$json_security_channels = json_encode($json_security_channels,true);
file_put_contents("data/$chid.json",$json_security_channels);
	bot('sendmessage',[
	'chat_id'=>$chid,
	'text'=>"🔓 ¦ تم فتح $videos بنجاح ؛ \n📡 ¦ قناة المطور $channel\n√",
  'reply_to_message_id'=>$messageid,
 ]);
}

# @Bota_Syria #
if($chtext =="قفل الملصقات" ){
$json_security_channels["lock"]["sticker"]="close";
$json_security_channels = json_encode($json_security_channels,true);
file_put_contents("data/$chid.json",$json_security_channels);
	bot('sendmessage',[
	'chat_id'=>$chid,
	'text'=>"🔐 ¦ تم قفل $stickers بنجاح ؛ \n📡 ¦ قناة المطور $channel\n√",
  'reply_to_message_id'=>$messageid,
 ]);
 }

# @Bota_Syria #
if($chtext =="فتح الملصقات" ){
$json_security_channels["lock"]["sticker"]="open";
$json_security_channels = json_encode($json_security_channels,true);
file_put_contents("data/$chid.json",$json_security_channels);
	bot('sendmessage',[
	'chat_id'=>$chid,
	'text'=>"🔓 ¦ تم فتح $stickers بنجاح ؛ \n📡 ¦ قناة المطور $channel\n√",
  'reply_to_message_id'=>$messageid,
 ]);
}

# @Bota_Syria #
if($chtext =="قفل المتحركة" ){
$json_security_channels["lock"]["document"]="close";
$json_security_channels = json_encode($json_security_channels,true);
file_put_contents("data/$chid.json",$json_security_channels);
	bot('sendmessage',[
	'chat_id'=>$chid,
	'text'=>"🔐 ¦ تم قفل $documents بنجاح ؛ \n📡 ¦ قناة المطور $channel\n√",
  'reply_to_message_id'=>$messageid,
 ]);
}

# @Bota_Syria #
if($chtext =="فتح المتحركة" ){
$json_security_channels["lock"]["document"]="open";
$json_security_channels = json_encode($json_security_channels,true);
file_put_contents("data/$chid.json",$json_security_channels);
	bot('sendmessage',[
	'chat_id'=>$chid,
	'text'=>"🔓 ¦ تم فتح $documents بنجاح ؛ \n📡 ¦ قناة المطور $channel\n√",
  'reply_to_message_id'=>$messageid,
 ]);
 }

# @Bota_Syria #
if($chtext =="قفل التوجيه" ){
$json_security_channels["lock"]["forward"]="close";
$json_security_channels = json_encode($json_security_channels,true);
file_put_contents("data/$chid.json",$json_security_channels);
	bot('sendmessage',[
	'chat_id'=>$chid,
	'text'=>"🔐 ¦ تم قفل $forwards بنجاح ؛ \n📡 ¦ قناة المطور $channel\n√",
  'reply_to_message_id'=>$messageid,
 ]);
}

# @Bota_Syria #
if($chtext =="فتح التوجيه" ){
$json_security_channels["lock"]["forward"]="open";
$json_security_channels = json_encode($json_security_channels,true);
file_put_contents("data/$chid.json",$json_security_channels);
	bot('sendmessage',[
	'chat_id'=>$chid,
	'text'=>"🔓 ¦ تم فتح $forwards بنجاح ؛ \n📡 ¦ قناة المطور $channel\n√",
  'reply_to_message_id'=>$messageid,
 ]);
}

# @Bota_Syria #
if($chtext =="قفل الصوت" ){
$json_security_channels["lock"]["audio"]="close";
$json_security_channels = json_encode($json_security_channels,true);
file_put_contents("data/$chid.json",$json_security_channels);
	bot('sendmessage',[
	'chat_id'=>$chid,
	'text'=>"🔐 ¦ تم قفل $audios بنجاح ؛ \n📡 ¦ قناة المطور $channel\n√",
  'reply_to_message_id'=>$messageid,
 ]);
}

# @Bota_Syria #
if($chtext =="فتح الصوت" ){
$json_security_channels["lock"]["audio"]="open";
$json_security_channels = json_encode($json_security_channels,true);
file_put_contents("data/$chid.json",$json_security_channels);
	bot('sendmessage',[
	'chat_id'=>$chid,
	'text'=>"🔓 ¦ تم فتح $audios بنجاح ؛ \n📡 ¦ قناة المطور $channel\n√",
  'reply_to_message_id'=>$messageid,
 ]);
}

# @Bota_Syria #
if($chtext =="قفل الموقع" ){
$json_security_channels["lock"]["contact"]="close";
$json_security_channels = json_encode($json_security_channels,true);
file_put_contents("data/$chid.json",$json_security_channels);
	bot('sendmessage',[
	'chat_id'=>$chid,
	'text'=>"🔐 ¦ تم قفل $contacts بنجاح ؛ \n📡 ¦ قناة المطور $channel\n√",
  'reply_to_message_id'=>$messageid,
 ]);
}

# @Bota_Syria #
if($chtext =="فتح الموقع" ){
$json_security_channels["lock"]["contact"]="open";
$json_security_channels = json_encode($json_security_channels,true);
file_put_contents("data/$chid.json",$json_security_channels);
	bot('sendmessage',[
	'chat_id'=>$chid,
	'text'=>"🔓 ¦ تم فتح $contacts بنجاح ؛ \n📡 ¦ قناة المطور $channel\n√",
  'reply_to_message_id'=>$messageid,
 ]);
}

# @Bota_Syria #
if($chtext =="قفل الروابط" ){
$json_security_channels["lock"]["link"]="close";
$json_security_channels = json_encode($json_security_channels,true);
file_put_contents("data/$chid.json",$json_security_channels);
	bot('sendmessage',[
	'chat_id'=>$chid,
	'text'=>"🔐 ¦ تم قفل $links بنجاح ؛ \n📡 ¦ قناة المطور $channel\n√",
  'reply_to_message_id'=>$messageid,
 ]);
}

# @Bota_Syria #
if($chtext =="فتح الروابط" ){
$json_security_channels["lock"]["link"]="open";
$json_security_channels = json_encode($json_security_channels,true);
file_put_contents("data/$chid.json",$json_security_channels);
	bot('sendmessage',[
	'chat_id'=>$chid,
	'text'=>"🔓 ¦ تم فتح $links بنجاح ؛ \n📡 ¦ قناة المطور $channel\n√",
  'reply_to_message_id'=>$messageid,
 ]);
}

# @Bota_Syria #
if($chtext =="قفل المعرفات" ){
$json_security_channels["lock"]["username"]="close";
$json_security_channels = json_encode($json_security_channels,true);
file_put_contents("data/$chid.json",$json_security_channels);
	bot('sendmessage',[
	'chat_id'=>$chid,
	'text'=>"🔐 ¦ تم قفل $usernames بنجاح ؛ \n📡 ¦ قناة المطور $channel\n√",
  'reply_to_message_id'=>$messageid,
 ]);
}

# @Bota_Syria #
if($chtext =="فتح المعرفات" ){
$json_security_channels["lock"]["username"]="open";
$json_security_channels = json_encode($json_security_channels,true);
file_put_contents("data/$chid.json",$json_security_channels);
	bot('sendmessage',[
	'chat_id'=>$chid,
	'text'=>"🔓 ¦ تم فتح $usernames بنجاح ؛ \n📡 ¦ قناة المطور $channel\n√",
  'reply_to_message_id'=>$messageid,
 ]);
}

# @Bota_Syria #
if( $chtext == "الاوامر" ){
            bot('sendmessage',[
	        'chat_id'=>$chid,
	        'text'=>"
⚙¦ الاوامر الحماية

💥¦ قفل ~ فتح ⊱ $usernames ⊰
💥¦ قفل ~ فتح ⊱ $links ⊰
💥¦ قفل ~ فتح ⊱ $audios ⊰
💥¦ قفل ~ فتح ⊱ $contacts ⊰
💥¦ قفل ~ فتح ⊱ $forwards ⊰
💥¦ قفل ~ فتح ⊱ $videos ⊰
💥¦ قفل ~ فتح ⊱ $photos ⊰
💥¦ قفل ~ فتح ⊱ $stickers ⊰
💥¦ قفل ~ فتح ⊱ $documents ⊰
💥¦ مسح + العدد لحذف الرسائل
💥¦ الرابط لعرض الرابط
", 'reply_to_message_id'=>$messageid,
        ]);
        }
# @Bota_Syria #
if( $text == "/start" ){
            bot("sendphoto",[
            "photo"=>"https://2.top4top.net/p_1280fxflb1.jpg",
            "chat_id"=>$chat_id,
            "caption"=>"
👋🏻 مرحباً بك ، في بوت حماية القنوات من الميديا الأفضل والأقوى والأول في التيليجرام 🍃 

⬜️ عن طريق هذا البوت تستطيع حماية قناتك وقفل وفتح الميديا ألخ 

⬜️ البوت سهل وسريع ولايتوقف لحظة ، ثقة + ضمان من قبل المطور 

⬜️ أرفع البوت أدمن بـ قناتك مباشرة ، ثم أرسل تفعيل في القناة ثم أرسل  الاوامر لـ عرض أوامر القفل والفتح ✔️
", 'reply_to_message_id'=>$message_id,
        ]);
        }
    $linkex = json_decode(file_get_contents("https://api.telegram.org/bot".security."/exportChatInviteLink?chat_id=$chid"));
    $linkchannel = $linkex->result;
    if( $chtext == "الرابط" ){
            bot('sendmessage',[
	        'chat_id'=>$chid,
	        'text'=>"
رابط القناة هو 
$linkchannel
", 'reply_to_message_id'=>$messageid,'disable_web_page_preview'=>true,
        ]);
        }
/*
جميع حقوق الملف محفوظة ©
لا نسمح بنشر الملف بدون ذكر المصدر
قناة المطور @Bots_Syria
مطور الملف مصطفى السوري @gggggr
*/
