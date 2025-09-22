<?php
require_once '../vendor/autoload.php';

// Set API key untuk sandbox atau production
Midtrans\Config::$serverKey = 'SB-Mid-server-WaQNfLdaeA5n1RUe52qYLR7m';
Midtrans\Config::$clientKey = 'SB-Mid-client-TupJwk5d32RV-Avs';
Midtrans\Config::$isProduction = false; // Set false untuk sandbox, true untuk produksi
Midtrans\Config::$isSanitized = true;
Midtrans\Config::$is3ds = true;
?>
