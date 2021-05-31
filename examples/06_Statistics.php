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

// get merchant's balances and operations volume - more about it https://www.alfacoins.com/developers#post_requests-stats
try {
  echo 'Stats result:' . PHP_EOL;
  var_dump($api->stats());
} catch (ALFAcoins_Exception $e) {
  echo "Stats method failed: " . $e->getMessage() . PHP_EOL;
}
