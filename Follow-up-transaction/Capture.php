<?php
require_once '../clickpay-plugin.php';
$plugin = new Clickpay();

$request_url = 'payment/request';
$data = [
    "tran_type" => "capture",
    "tran_class" => "ecom",
    "cart_id" => "cart_66666",
    "cart_currency" => "SAR",
    "cart_amount" => 130,
    "cart_description" => "shopping Cart",
    "tran_ref" => "TST2105400087083" //the Auth tran_ref you want to capture it
];
$page = $plugin->send_api_request($request_url, $data);
print_r($page);
exit();
