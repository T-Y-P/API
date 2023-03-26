<?php
header("Access-Control-Allow-Origin:*");
$content = file_get_contents("https://m.weibo.cn/api/container/getIndex?containerid=106003type%3D25%26t%3D3%26disable_hot%3D1%26filter_type%3Drealtimehot");
$json = json_decode($content,true);
$text = array(//这里只取10个
"Top_1" => $json['data']['cards'][0]['card_group'][0]['desc'],
"Top_2" => $json['data']['cards'][0]['card_group'][1]['desc'],
"Top_3" => $json['data']['cards'][0]['card_group'][2]['desc'],
"Top_4" => $json['data']['cards'][0]['card_group'][3]['desc'],
"Top_5" => $json['data']['cards'][0]['card_group'][4]['desc'],
"Top_6" => $json['data']['cards'][0]['card_group'][5]['desc'],
"Top_7" => $json['data']['cards'][0]['card_group'][6]['desc'],
"Top_8" => $json['data']['cards'][0]['card_group'][7]['desc'],
"Top_9" => $json['data']['cards'][0]['card_group'][8]['desc'],
"Top_10" => $json['data']['cards'][0]['card_group'][9]['desc']);
header("Content-Type:text/json");
echo json_encode($text,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
?>