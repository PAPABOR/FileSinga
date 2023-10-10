<?php
echo '#EXTM3U'."\n";
echo '#EXT-X-VERSION: 3'."\n";
echo '#EXT-X-STREAM-INF:PROGRAM-ID=1,CLOSED-CAPTIONS=NONE,BANDWIDTH=1500000,NAME=720p,RESOLUTION=1280x720'."\n";

function curl_url($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_REFERER, 'https://google.com');
    
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36');
    
    $resp = curl_exec($ch);
    curl_close($ch);
    return $resp;
}

$url = 'https://api.filelions.com/api/file/direct_link?key=895bvq8x2cvnmt2bih6&file_code=zt56ppnltfk5';

$get = curl_url($url);
$json = json_decode($get, true);

echo $json['result']['hls_direct'];

?>
