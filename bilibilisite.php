<?php
header("Access-Control-Allow-Origin:*");
header('Content-Type:application/json; charset=utf-8');

$uid = $_GET["uid"];

if(empty($uid)) {
    echo json_encode(array("code" => 0, "msg" => "请填写B站用户UID"), JSON_UNESCAPED_UNICODE);
    exit;
}

$url1 = 'https://api.bilibili.com/x/space/wbi/acc/info?mid=' . $uid;
//获取up主基本消息
$url2 = 'https://api.bilibili.com/x/relation/stat?vmid=' . $uid;
//获取粉丝和关注数量
$url3 = 'https://api.bilibili.com/x/space/upstat?mid=' . $uid;
//获取视频总播放，需要cookie

//计数器文件路径
$countFilePath = 'count.txt';

//读取计数器
$count = file_get_contents($countFilePath);
$count = $count ? intval($count) : 0;

//增加计数器
$count++;

$header = array(
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36',
    'Referer: https://www.bilibili.com/',
    'Accept-Language: zh-CN,zh;q=0.9,en-US;q=0.8,en;q=0.7',
    'Cookie: 填写你自己的cookie'
    );

$opts = array(
    'http' => array(
        'method' => 'GET',
        'header' => implode("\r\n", $header)
    )
);

$context = stream_context_create($opts);
$response1 = file_get_contents($url1, false, $context);
$response2 = file_get_contents($url2, false, $context);
$response3 = file_get_contents($url3, false, $context);

$wei = json_decode($response1, true);
$wei2 = json_decode($response2, true);
$wei3 = json_decode($response3, true);

$code1 = $wei['code'];
$code2 = $wei2['code'];
$code3 = $wei3['code'];

// 检查两个请求都成功
if ($code1 == 0 && $code2 == 0 && $code3 == 0) {
    $mid = $wei['data']['mid'];   
    $name = $wei['data']['name'];
    $sex = json_decode('"'.$wei['data']['sex'].'"');
    $face = $wei['data']['face'];  
    $level = $wei['data']['level'];   
    $sign = $wei['data']['sign'];   
    $text = empty($wei['data']['vip']['label']['text']) ? '无' : $wei['data']['vip']['label']['text'];
    $title = $wei['data']['live_room']['title'];
    $zburl = $wei['data']['live_room']['url'];
    $roomid = $wei['data']['live_room']['roomid'];
    $following = $wei2['data']['following'];
    $follower = $wei2['data']['follower'];
    $archive = $wei3['data']['archive']['view'];
    $article = $wei3['data']['article']['view'];
    $likes = $wei3['data']['likes'];

  $output = array( 
    "code" => 1,    
    "msg" => "获取成功!",    
    "data" => array(        
        "mid" => $mid,
        //获取uid        
        "name" => $name, 
        //获取名字       
        "sex" => $sex,       
        //获取性别
        "face" => $face,        
        //头像链接
        "level" => $level,        
        //获取等级
        "sign" => $sign, 
        //获取签名
        "text" => $text,
        //获取会员
        "$title" => $title,
        //
        "following" => $following,       
        //获取关注数量
        "follower" => $follower,      
        //获取粉丝数
        "archive" => $archive,      
        //总播放量
        "article" => $article,      
        //阅读数
        "likes" => $likes   
        // 获取我你点赞数
    ),
    "cs" => array(
         "cs" => "酷库博客提醒您共调用了:".$count."次接口",
    )
);

// 增加计数器
file_put_contents($countFilePath, $count);

// 输出接口调用次数

header('Content-Type: application/json; charset=utf-8');
echo json_encode($output, JSON_UNESCAPED_UNICODE);
}else {
  // 9. 请求失败，输出错误信息
  echo json_encode(array("code" => 0, "msg" => "请求失败，错误码：info={$code1}，stat={$code2}"));
}

?>