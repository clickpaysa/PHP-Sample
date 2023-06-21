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
    "cart_amount" => 200,
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
    "user_defined" => [
        "udf9" => "UDF9 Test9",
        "udf3" => "UDF3 Test3"
    ]
];
$page = $plugin->send_api_request($request_url, $data);
header('Location:' . $page['redirect_url']); /* Redirect browser */
exit();
