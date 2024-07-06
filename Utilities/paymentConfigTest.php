<?php
require_once("vendor/autoload.php");

$test_keys = array(
    "publishable_key" => "pk_test_51N2wCKBzMqjLra0MzROKqj2fAJeMwtGxpzkLXFE84vT2KgbZjVUz55UKFAkmzaPOzJSadTr7w6qg49GOSGaLy1sh00rY4EvQ2t",
    "secret_key" => "sk_test_51N2wCKBzMqjLra0Mla2Ae0MHagu74o85FJC9Rgu4Pjo2tyXXj6IYSvvo5eVS4UnKK8H9HMLNQVAlYupjRvpCxRYJ00Bm844p6y"
);
\Stripe\Stripe::SetApiKey($test_keys['secret_key']);
?>
