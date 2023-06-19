<?php
header("Content-Type: text/html; charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);

$id = $_GET['id'];
$msg = $_GET['msg'];

if (!isset($id, $msg)) {
    exit("参数错误");
}

// 对输入参数进行安全验证
if ($id !== "加密" && $id !== "解密") {
    exit("非法操作");
}

// 对 msg 进行过滤
$msg = htmlspecialchars(trim($msg), ENT_QUOTES, 'UTF-8');

if ($id === "加密") {
    $encoded = base64_encode($msg);
    echo "加密结果：" . $encoded;
} else {
    // 对解码结果进行过滤和转义
    $decoded = htmlspecialchars(base64_decode(str_replace(" ", "+", $msg)), ENT_QUOTES, 'UTF-8');
    echo "解密结果：" . $decoded;
}
?>