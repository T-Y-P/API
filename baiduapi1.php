<?php
/*
 * @Name: AXI
 * @Date: 2022-06-20
 * @ContactTG: @czgov
 */
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ?"https://": "http://";
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//  echo $url;
$urls = array($url);
$api = 'http://data.zz.baidu.com/urls?site你的域名&token=你百度资源的token';
$ch = curl_init();
$options =  array(
    CURLOPT_URL => $api,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => implode("\n", $urls),
    CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
);
curl_setopt_array($ch, $options);
$result = curl_exec($ch);
echo "<script>console.log('当前百度推送$result;')</script>";
// echo $result;测试打印 可直接删除
?>

<!--建议放到网站的底部 这样访问一次 百度提交一次-->