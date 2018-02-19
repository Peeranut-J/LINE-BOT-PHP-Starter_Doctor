<?php
$access_token = 'YyUblgp0oX5FHC+FyUZNIBqtbEyL6Gy+553qbnn47vheHJdea8tjEnYZ2FPO2gCxxtkHSTderuTtDApHC6EZEeb/It0yyE9/QzWQ609ZEqkqFI0shz8X0wf2tWbk8eNpnCcZhzah9G5aKmEyEOqVGQdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;