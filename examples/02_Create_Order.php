<?php

// include once ALFAcoins Private API class
require_once '../src/ALFAcoins_privateAPI.php';
require_once '../src/ALFAcoins_Exception.php';

use ALFAcoins\ALFAcoins_privateAPI;
use ALFAcoins\ALFAcoins_Exception;

// shop_name is the API name, replace 'ShopName 123' with your API name. Create API entry at https://www.alfacoins.com/user
$shop_name = 'ShopName 123';

// shop_password_hash is an uppercase md5 hash of API password, replace 'MyShopPassword' with your actual API password
$shop_password = 'MyShopPassword';

// shop_secret_key is your API secret_key, it's shown one time after you created the new API entry, if you didn't write it down you can reset it in your API settings
$shop_secret_key = 'a8a0e3497c8b67b024babc9a4daf5f5c';

// initialize ALFAcoins Private API class with your API settings
$api = new ALFAcoins_privateAPI($shop_name, $shop_password, $shop_secret_key);

// prepare options to create a new order, more about it here: https://www.alfacoins.com/developers#post_requests-create
$options = [
  // notificationURL is used for notification about order's status change
  // PLEASE NOTE: you can only use verified websites in the websites integration area
  'notificationURL' => 'http://example.com/receive.php',
  // redirectURL is used to redirect your customer from the payment page
  'redirectURL' => 'http://example.com/completed?id=MyOrder123',
  // payerName is your customer's name used to notify your customer about order
  'payerName' => 'John Smith',
  // payerEmail is your customer's e-mail address used to notify your customer about order
  'payerEmail' => 'john.smith@test.com',
];

// internal order_id which you can use to track this order in your own system, will be also displayed on the payment page
$order_id = '999';

// order description (will be displayed on your payment page)
$order_description = 'Payment for Order #999';

// cryptocurrency type
$type = 'bitcoin';

// amount in fiat currency, 100 USD in our example
$fiat_amount = 100;

// amount currency type, if you leave this parameter blank default will be used from your API settings
$fiat_currency = 'USD';

// create new order, more about it - https://www.alfacoins.com/developers#post_requests-create
try {
  echo 'Order create result:' . PHP_EOL;
  $order = $api->create($type, $fiat_amount, $fiat_currency, $order_id, $order_description, $options);
  var_dump($order);
} catch (ALFAcoins_Exception $e) {
  echo "Order create method failed: " . $e->getMessage() . PHP_EOL;
}

// get order status, more about it - https://www.alfacoins.com/developers#post_requests-status
try {
  echo 'Order status result:' . PHP_EOL;
  var_dump($api->status($order['id']));
} catch (ALFAcoins_Exception $e) {
  echo "Order status method failed: " . $e->getMessage() . PHP_EOL;
}