<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.swag.live/feeds/619d19da1cc153082b8a88c6?limit=30&page=1&no-redirect=1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: api.swag.live';
$headers[] = 'Cache-Control: max-age=0';
$headers[] = 'Sec-Ch-Ua: ^^';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: ^^Windows^^\"\"';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36 Edg/96.0.1054.29';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
$headers[] = 'Sec-Fetch-Site: none';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-User: ?1';
$headers[] = 'Sec-Fetch-Dest: document';
$headers[] = 'Accept-Language: en-US,en;q=0.9';
$headers[] = 'If-None-Match: W/^^007582d8578c14518ca7cc38cc4e94f8a419a308^^\"\"';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

$json = json_decode($result);
$i=1;
foreach($json as $data){
    $username = $data->username;
    $id = $data->id;
    echo $i.") ".$username." | vlc://https://watch.swag.live/".$id."/public.mpd\n";
    $i++;
}