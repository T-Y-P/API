<?php
/**
 * 百度Site查询接口
 * code    200->正常;201->没有请求参数
 * state   1->收录;0->未收录
 */
header("Access-Control-Allow-Origin:*");
header('Content-type: application/json');
if(!isset($_GET['url'])||empty($_GET['url'])||$_GET['url']==''){
    echo json_encode(array('code'=>'201','msg'=>'请填写请求参数'));
    exit();
}
// 请求地址www.czmz.cn
$url = $_GET['url'];
// 百度搜索地址http://www.baidu.com/s?wd=site:0735.pro
$baidu='http://www.baidu.com/s?wd='.$url;
 
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,$baidu);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,false);curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
$rs=curl_exec($curl);
curl_close($curl);
 
$str = preg_match_all('/很抱歉，没有找到与/',$rs,$baidu);
 
if(!empty($str)){
    // 无以下是网页中包含信息
    echo json_encode(array('code'=>'200','url'=>$url,'state'=>'0'));
}else{
    // 有以下是网页中包含信息
    $str = preg_match_all('/<font class="c-gray">没有找到该URL。您可以直接访问&nbsp;<\/font>/',$rs,$baidu);
    if($str){
        echo json_encode(array('code'=>'200','url'=>$url,'state'=>'0'));
    }else{
        echo json_encode(array('code'=>'200','url'=>$url,'state'=>'1'));
    }
    
}
