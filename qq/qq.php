<?php
$qq = $_GET['qq'];
$url = "mqq://card/show_pslcard?src_type=internal&version=1&uin={$qq}&card_type=person&source=sharecard";
header('Location: ' . $url);
?>