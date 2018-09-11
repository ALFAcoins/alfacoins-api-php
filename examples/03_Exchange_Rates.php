<?php

// include once ALFAcoins Public API class
require_once '../src/publicAPI.php';
require_once '../src/Exception.php';

use ALFAcoins\ALFAcoins_publicAPI;
use ALFAcoins\ALFAcoins_Exception;

// initialize ALFAcoins Public API class
$api = new ALFAcoins_publicAPI();

// get BTC/USD exchange rate for 1 BTC (example of response: ["6459.83401257"]), more about it - https://www.alfacoins.com/developers#get_requests-rate
try {
  echo 'Rate result:' . PHP_EOL;
  var_dump($api->rate('BTC','USD'));
} catch (ALFAcoins_Exception $e) {
  echo "Rate method failed: " . $e->getMessage() . PHP_EOL;
}

// get exchange rates for all available pairs, more about it - https://www.alfacoins.com/developers#get_requests-rates
try {
  echo 'Rates result:' . PHP_EOL;
  var_dump($api->rates());
} catch (ALFAcoins_Exception $e) {
  echo "Rates method failed: " . $e->getMessage() . PHP_EOL;
}
