<?php
require_once '../clickpay-plugin.php';
$plugin = new Clickpay();

$base_url = $plugin->getBaseUrl();
$request_url = 'payment/request';
$data = [
    "tran_type" => "sale",
    "tran_class" => "ecom",
    "cart_id" => "cart_11111",
    "cart_currency" => "SAR",
    "cart_amount" => 1000,
    "cart_description" => "Description of the items/services",
    "paypage_lang" => "en",
    "callback" => "https://webhook.site/730acce0-e54e-4522-8a45-f9b8e44624b6", // Nullable - Must be HTTPS, otherwise no post data from clickpay
    "return" => $base_url."Result.php", // Must be HTTPS, otherwise no post data from clickpay , must be relative to your site URL
    "customer_details" => [
        "name" => "first last",
        "email" => "email@domain.com",
        "phone" => "0522222222",
        "street1" => "address street",
        "city" => "Riyadh",
        "state" => "Riyadh",
        "country" => "SA",
        "zip" => "12345"
    ],
    "shipping_details" => [
        "name" => "name1 last1",
        "email" => "email1@domain.com",
        "phone" => "971555555555",
        "street1" => "street2",
        "city" => "Riyadh",
        "state" => "Riyadh",
        "country" => "SA",
        "zip" => "54321"
    ],
    "card_details" => [
        "pan" => "4000000000000002",
        "cvv" => "123",
        "expiry_month" => 12,
        "expiry_year" => 2025
    ]
];


$page = $plugin->send_api_request($request_url, $data);
header('Location:' . $page['redirect_url']); /* Redirect browser */
exit();
