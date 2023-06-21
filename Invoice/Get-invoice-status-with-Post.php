<?php
require_once '../clickpay-plugin.php';
$plugin = new Clickpay();

$invoice_id = 333003;
$request_url = 'payment/invoice/status';
$data = [
    'invoice_id' => $invoice_id
];

$page = $plugin->send_api_request($request_url, $data);
print_r('the invoice details is');
print_r('<br>');
print_r($page);

exit();
