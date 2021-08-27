<?php

$url = $_GET["c"];
if($url !=""){

$data = file_get_contents("https://catalogapi.zee5.com/v1/channel/${url}");
$z5 =json_decode($data, true);
$stream = $z5['stream_url_hls'];
$title = $z5['title'];

$tdata = file_get_contents("https://useraction.zee5.com/token/live.php");
$tok =json_decode($tdata, true);
$vid_token = $tok['video_token'];
$playit = $stream.$vid_token;

//echo $playit;
header("Location: $playit"); //--> For Direct Play

}
else{
  $ex= array("error" => "Something went wrong, Check URL", "created_by" => "Avishkar Patil" );
  $error =json_encode($ex);

  echo $error;
}

?>
