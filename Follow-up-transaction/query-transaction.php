<?php
require_once '../clickpay-plugin.php';
$plugin = new Clickpay();

$request_url = 'payment/query';
$data = [
    "tran_ref" => "TST2104800080101"
];
$page = $plugin->send_api_request($request_url, $data);
print_r($page);
exit();
