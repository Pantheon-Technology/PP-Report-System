<?php
require_once("vendor/autoload.php");

$test_keys = array(
    "publishable_key" => "pk_live_51LecHHI8iyY9hSHqXiizzlZhoRLyGQbLgMJrpeTPaLBpHHAQ8iwLyM79eyu5nn7DVYkrMbeQas59kamdC1oZHS1X00CTpmV7M3",
    "secret_key" => "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"
);
\Stripe\Stripe::SetApiKey($test_keys['secret_key']);
?>
