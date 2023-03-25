<?php
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ?"https://": "http://";
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$urls = array($url);
$wz =  (isHTTPS() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'];
/*判断当前链接是http还是https */
function isHTTPS()
{
    if (defined('HTTPS') && HTTPS) return true;
    if (!isset($_SERVER)) return FALSE;
    if (!isset($_SERVER['HTTPS'])) return FALSE;
    if ($_SERVER['HTTPS'] === 1) {  
        return TRUE;
    } elseif ($_SERVER['HTTPS'] === 'on') { 
        return TRUE;
    } elseif ($_SERVER['SERVER_PORT'] == 443) { 
        return TRUE;
    }
    return FALSE;
}

$api = "http://data.zz.baidu.com/urls?site=$wz&token=AWV3YGVv1vQKMJeR";
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
?>
<!--建议放到网站的底部 这样访问一次 百度提交一次-->