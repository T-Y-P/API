<?php
if(isset($_GET["msg"])){
    $txt = $_GET["msg"];//需要聊天的内容
    $type = isset($_GET["type"]) ? $_GET["type"] : "json";//返回格式，默认为json
    $url="https://ai-voice.api.xiaomi.net/aivs/v2.2/text?erequestId=&token=&userId=de5eb5e5-00ba-4a3a-8b34-4e5f4b956a91&latitude=&longitude=";
    $post="{requestText:".$txt."}";
    $referer=0;
    $cookie=0;
    $ua="Mozilla/5.0 (Linux; Android 4.4.4; vivo Y13L Build/KTU84P) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/33.0.0.0 Mobile Safari/537.36";
    $str=get_curl($url,$post,$referer,$cookie,0,$ua);
    preg_match_all("/{\"requestId\":\"(.*?)\",\"requestType\":(.*?),\"resultCode\":(.*?),\"requestText\":\"(.*?)\",\"domain\":\"(.*?)\",\"responseText\":\"(.*?)\",\"directive\":{\"displayText\":\"(.*?)\",\"url\":\"(.*?)\",\"index\":(.*?),\"duration\":(.*?),\"offset\":(.*?)}}/",$str,$xi);
    preg_match_all("/\"responseText\":\"(.*?)\"/",$str,$txt);
    if($txt[1][0]==null)
    {
        preg_match_all("/\"url\":\"(.*?)\"/",$str,$xx);
        $result = array("text"=>"","tips"=>"小爱同学聊天");
    }else{
        $result = array("text"=>$xi[7][0],"tips"=>"小爱同学聊天");
    }
    if($type == "txt"){
        echo $result["text"];
    }else{
        $output = array("code"=>200,"data"=>$result);
        echo json_encode($output, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
}else{
    $output = array("code"=>400,"data"=>array("error"=>"参数错误"));
    echo json_encode($output, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

function get_curl($url,$post=0,$referer=1,$cookie=0,$header=0,$ua=0,$nobaody=0)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $httpheader[] = "Accept:application/json";
    $httpheader[] = "Accept-Encoding:gzip,deflate,sdch";
    $httpheader[] = "Accept-Language:zh-CN,zh;q=0.8";
    $httpheader[] = "Connection:close";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
    if($post){
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    if($header){
        curl_setopt($ch, CURLOPT_HEADER, TRUE);
    }
    if($cookie){
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    }
    if($referer){
        if($referer==1){
            curl_setopt($ch, CURLOPT_REFERER, 'http://m.qzone.com/infocenter?g_f=');
        }else{
            curl_setopt($ch, CURLOPT_REFERER, $referer);
        }
    }

    if($ua){
        curl_setopt($ch, CURLOPT_USERAGENT,$ua);
    }else{
        curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/5.5 Mobile Safari/533.1');
    }
    if($nobaody){
        curl_setopt($ch, CURLOPT_NOBODY,1);
    }
    curl_setopt($ch, CURLOPT_ENCODING, "gzip");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    $ret = curl_exec($ch);
    curl_close($ch);
    return $ret;
}
?>
