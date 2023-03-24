<?php
header("Access-Control-Allow-Origin:*");
header('Content-Type:application/json; charset=utf-8');
$site = (isset($_GET['site']))?$_GET['site']:$_POST['site'];
if(empty($site))  echo '查询域名不能为空';

$count = baiduSL ($site);

if(!isset($count))  showjson(array('code'=>200502,'msg'=>'查询失败，请重试！'));
if(!$count)  $count = 0;
$result=array(
    'code'=>1,
    'site'=>$site,
    'data'=>$count
);
print_r(json_encode($result));

unset($site,$result,$ch);
function baiduSL ($site) {
     $baidu='https://www.baidu.com/s?ie=utf-8&tn=baidu&wd=site%3A'.$site; 
     $bdsite=BD_curl($baidu); 
     $bdsite = str_replace(array("\r\n", "\r", "\n", '    '), '', $bdsite); 
     if (!$count) preg_match('/找到相关结果数约(.*?)个/i',$bdsite,$count);
     $baiduSL=strip_tags($count[1]); 
     unset($count);
     return $baiduSL;
}
function BD_curl($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/601.1");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $ret = curl_exec($ch);
    curl_close($ch);
    return $ret;
}
?>