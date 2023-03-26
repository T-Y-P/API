<?php
/* ========== 接口逻辑区 ========== */
$qq = $_REQUEST['qq'];//获取的QQ号码
$si = $_REQUEST['si']?:4;//头像的大小
$type = $_REQUEST['type'];//返回的类型
if (empty($qq)) {
    switch ($type) {
        case 'text':
            exit('请输入正确的账号!');
        default:
            exit(send(array('code' => -1, 'text' => '请输入正确的账号!')));
    }
}
$url = 'https://s.p.qq.com/pub/get_face?img_type='.$si.'&uin='.$qq.'';
$data = get_headers($url,true)['Location'];
$value = explode("&k=",$data)[1];
$img_tx = explode("&s=",$value)[0];
$tulian = 'http://q.qlogo.cn/g?b=timqq&k='.$img_tx.'&s='.$si.'';
if (!empty($value)) {
    switch ($type) {
        case 'text':
            exit(''.$tulian.'');
        default:
            exit(send(array('code' => 1, 'text' => '获取成功!', 'uin' => $qq, 'img' => $tulian)));
    }
}else{
    switch ($type) {
        case 'text':
            exit('获取头像地址失败!');
        default:
            exit(send(array('code' => -2, 'text' => '获取头像地址失败!')));
    }
}
/* ========== 接口逻辑区 ========== */
function send($Msg){
header('content-type:application/json');
        echo json_encode($Msg,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}
?>