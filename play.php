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
$m3u8 = $stream.$vid_token;

}
?>

<html>
<head>
  <title><?php echo $title; ?> | Avishkar Patil</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <link rel="shortcut icon" type="image/x-icon" href="https://www.zee5.com/images/ZEE5_logo.svg">
  <link rel="stylesheet" href="https://cdn.plyr.io/3.6.2/plyr.css" />
  <link href="https://fonts.googleapis.com/css?family=Poppins|Quattrocento+Sans" rel="stylesheet"/>
  <script src="https://cdn.plyr.io/3.6.3/plyr.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/hls.js"></script>
</head>
<style>
html {
  font-family: Poppins;
  background: #000;
  margin: 0;
  padding: 0
}
.loading {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #000;
        z-index: 9999;
    }
    
    .loading-text {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        text-align: center;
        width: 100%;
        height: 100px;
        line-height: 100px;
    }
    
    .loading-text span {
        display: inline-block;
        margin: 0 5px;
        color: #00b3ff;
        font-family: 'Quattrocento Sans', sans-serif;
    }
    
    .loading-text span:nth-child(1) {
        filter: blur(0px);
        animation: blur-text 1.5s 0s infinite linear alternate;
    }
    
    .loading-text span:nth-child(2) {
        filter: blur(0px);
        animation: blur-text 1.5s 0.2s infinite linear alternate;
    }
    
    .loading-text span:nth-child(3) {
        filter: blur(0px);
        animation: blur-text 1.5s 0.4s infinite linear alternate;
    }
    
    .loading-text span:nth-child(4) {
        filter: blur(0px);
        animation: blur-text 1.5s 0.6s infinite linear alternate;
    }
    
    .loading-text span:nth-child(5) {
        filter: blur(0px);
        animation: blur-text 1.5s 0.8s infinite linear alternate;
    }
    
    .loading-text span:nth-child(6) {
        filter: blur(0px);
        animation: blur-text 1.5s 1s infinite linear alternate;
    }
    
    .loading-text span:nth-child(7) {
        filter: blur(0px);
        animation: blur-text 1.5s 1.2s infinite linear alternate;
    }
    
    .loading-text span:nth-child(8) {
        filter: blur(0px);
        animation: blur-text 1.5s 1.4s infinite linear alternate;
    }
    
    .loading-text span:nth-child(9) {
        filter: blur(0px);
        animation: blur-text 1.5s 1.6s infinite linear alternate;
    }
    
    .loading-text span:nth-child(10) {
        filter: blur(0px);
        animation: blur-text 1.5s 1.8s infinite linear alternate;
    }
    
    .loading-text span:nth-child(11) {
        filter: blur(0px);
        animation: blur-text 1.5s 2s infinite linear alternate;
    }
    
    .loading-text span:nth-child(12) {
        filter: blur(0px);
        animation: blur-text 1.5s 2.2s infinite linear alternate;
    }
    
    .loading-text span:nth-child(13) {
        filter: blur(0px);
        animation: blur-text 1.5s 2.4s infinite linear alternate;
    }
    
    @keyframes blur-text {
        0% {
            filter: blur(0px);
        }
        100% {
            filter: blur(4px);
        }
    }
        .plyr__video-wrapper::before {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 10;
            content: '';
            height: 35px;
            width: 35px;
            background: url('https://telegra.ph/file/22da4d29204c748a526a4.png') no-repeat;
            background-size: 35px auto, auto;
        }
        
            .plyr__video-wrapper::after {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 10;
            content: '';
            height: 35px;
            width: 35px;
            background: url('https://i.ibb.co/nRH5vb3/Zee5.png') no-repeat;
            background-size: 35px auto, auto;
        }
</style>
<body>
  <div id="loading" class="loading">
<div class="loading-text">
        <span class="loading-text-words">A</span>
        <span class="loading-text-words">V</span>
        <span class="loading-text-words">I</span>
        <span class="loading-text-words">S</span>
        <span class="loading-text-words">H</span>
        <span class="loading-text-words">K</span>
        <span class="loading-text-words">A</span>
        <span class="loading-text-words">R</span>
</div>
</div>
<video controls crossorigin poster="<?php echo $image; ?>" playsinline>
    <source type="application/x-mpegURL" src="<?php echo $m3u8; ?>"> </video>
</body>
<script>
  setTimeout(videovisible, 4000)
function videovisible() {
    document.getElementById('loading').style.display = 'none'
}
document.addEventListener("DOMContentLoaded", () => {
  const e = document.querySelector("video"),
    n = e.getElementsByTagName("source")[0].src,
    o = {};
  if(Hls.isSupported()) {
    var config = {
      maxMaxBufferLength: 100,
    };
    const t = new Hls(config);
    t.loadSource(n), t.on(Hls.Events.MANIFEST_PARSED, function(n, l) {
      const s = t.levels.map(e => e.height);
      o.quality = {
        default: s[0],
        options: s,
        forced: !0,
        onChange: e => (function(e) {
          window.hls.levels.forEach((n, o) => {
            n.height === e && (window.hls.currentLevel = o)
          })
        })(e)
      };
      new Plyr(e, o)
    }), t.attachMedia(e), window.hls = t
  } else {
    new Plyr(e, o)
  }
});
</script>
</html>
