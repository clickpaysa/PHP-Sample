<?php
require_once '../clickpay-plugin.php';
$plugin = new Clickpay();

$base_url = $plugin->getBaseUrl();
$request_url = 'payment/new/invoice';
$data = [
    "tran_type" => "sale",
    "tran_class" => "ecom",
    "tokenise" => 2,
    "cart_currency" => "SAR",
    "cart_amount" => "950",
    "cart_id" => "Test Cart",
    "cart_description" => "Test Description",
    "return" => $base_url."Result.php", // Must be HTTPS, otherwise no post data from clickpay , must be relative to your site URL
    "hide_shipping" => true,
    "invoice" => [
        "shipping_charges" => 0,
        "extra_charges" => 0,
        "extra_discount" => 0,
        "total" => 0,
        "line_items" => [
            [
                "sku" => "sku",
                "description" => "desc",
                "url" => "https://webhook.site/92ac6a52-256d-434b-bde8-94b1e73d3aa1",
                "unit_cost" => 950,
                "quantity" => 1,
                "net_total" => 950,
                "discount_rate" => 0,
                "discount_amount" => 0,
                "tax_rate" => 0,
                "tax_total" => 0,
                "total" => 950
            ]
        ]
    ]
];
$page = $plugin->send_api_request($request_url, $data);
print_r('your invoice id is' . $page['invoice_id']);
print_r('<br>');
print_r("<a href='{$page['invoice_link']}'>go to your invoice</a>");

exit();
