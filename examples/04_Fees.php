<?php

// include once ALFAcoins Public API class
require_once '../src/publicAPI.php';
require_once '../src/Exception.php';

use ALFAcoins\ALFAcoins_publicAPI;
use ALFAcoins\ALFAcoins_Exception;

// initialize ALFAcoins Public API class
$api = new ALFAcoins_publicAPI();

// get all service fees for all supported cryptocurrencies, more about it - https://www.alfacoins.com/developers#get_requests-fees
try {
  echo 'Fees result:' . PHP_EOL;
  var_dump($api->fees());
} catch (ALFAcoins_Exception $e) {
  echo "Fees method failed: " . $e->getMessage() . PHP_EOL;
}
