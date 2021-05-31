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

// BitSend is used to make payments to your customers (e.g. pay salaries). One BitSend request - one payment, you can't specify multiple addresses in a single BitSend request.
// set options for BitSend XRP request (address and destination_tag), more documentation can be found here: https://www.alfacoins.com/developers#post_requests-bitsend
$options = [
  'address' => 'rKPPJJKE6gC3GqkCpsAew5gp4w3o3hCU4D',
  'destination_tag' => '123',
];

// send 50 XRP to rKPPJJKE6gC3GqkCpsAew5gp4w3o3hCU4D with destination tag: 123
try {
  echo "Bitsend result:" . PHP_EOL;
  var_dump($bitsend = $api->bitsend(0, 50, 'xrp', $options, 'Client Name', 'noreply@alfacoins.com', 'Test Payment 50 XRP'));
} catch (ALFAcoins_Exception $e) {
  echo "Bitsend method failed: " . $e->getMessage() . PHP_EOL;
}

// get current status of your BitSend operation
try {
  echo "Bitsend Status result:" . PHP_EOL;
  var_dump($api->bitsend_status($bitsend['id']));
} catch (ALFAcoins_Exception $e) {
  echo "Bitsend status failed: " . $e->getMessage() . PHP_EOL;
}

// send 150 USD (depends on your API fiat currency settings, default is USD) XRP equivalent (using current exchange rate) to XRP account rKPPJJKE6gC3GqkCpsAew5gp4w3o3hCU4D with destination tag: 123
try {
  echo "Bitsend result: " . PHP_EOL;
  var_dump($api->bitsend(150, 0, 'xrp', $options, 'Client Name', 'noreply@alfacoins.com'));
} catch (ALFAcoins_Exception $e) {
  echo "Bitsend status failed: " . $e->getMessage() . PHP_EOL;
}

// get current status of your BitSend operation
try {
  echo "Bitsend Status result:" . PHP_EOL;
  var_dump($api->bitsend_status($bitsend['id']));
} catch (ALFAcoins_Exception $e) {
  echo "Bitsend status failed: " . $e->getMessage() . PHP_EOL;
}