<?php
// ©AvishkarPatil [ Telegram ]
// usage index.php?c=Channel_ID
// Don't Change Any Thing !

$url = $_GET["c"];
if($url !=""){

$data = file_get_contents("https://catalogapi.zee5.com/v1/channel/${url}");
$z5 =json_decode($data, true);
$stream = $z5['stream_url_hls'];

$tdata = file_get_contents("https://useraction.zee5.com/token/live.php");
$tok =json_decode($tdata, true);
$vid_token = $tok['video_token'];
$m3u8 = $stream.$vid_token;

//echo $m3u8;
header("Location: $m3u8"); //--> For Direct Play

}
else{
  $ex= array("error" => "Something went wrong, Check URL", "created_by" => "Avishkar Patil" );
  $error =json_encode($ex);

  echo $error;
}

?>
