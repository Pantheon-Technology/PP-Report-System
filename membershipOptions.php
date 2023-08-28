<?php include_once "config.php";
include_once "parentMenu.php";
require_once "paymentConfig.php"; 
$_SESSION['choice'] = true;
?>

<div class="w3-row-padding w3-center w3-padding-64" id="pricing">
    <h2>Membership Options</h2>
    <p>Choose a membership that works for you.</p><br>

    <div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-round">
        <li class="w3-theme">
        <script async
  src="https://js.stripe.com/v3/buy-button.js">
</script>

<stripe-buy-button
  buy-button-id="buy_btn_1Nhsp6BzMqjLra0MkgxE8fPN"
  publishable-key="pk_test_51N2wCKBzMqjLra0MzROKqj2fAJeMwtGxpzkLXFE84vT2KgbZjVUz55UKFAkmzaPOzJSadTr7w6qg49GOSGaLy1sh00rY4EvQ2t"
>
</stripe-buy-button>
        </li>
      </ul>
    </div>

    <div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-round">
        <li class="w3-theme">
        <script async
  src="https://js.stripe.com/v3/buy-button.js">
</script>

<stripe-buy-button
  buy-button-id="buy_btn_1Nht6IBzMqjLra0MZt98EBNT"
  publishable-key="pk_test_51N2wCKBzMqjLra0MzROKqj2fAJeMwtGxpzkLXFE84vT2KgbZjVUz55UKFAkmzaPOzJSadTr7w6qg49GOSGaLy1sh00rY4EvQ2t"
>
</stripe-buy-button>
        </li>
      </ul>
    </div>

    <div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-round">
        <li class="w3-theme">
        <script async
  src="https://js.stripe.com/v3/buy-button.js">
</script>

<stripe-buy-button
  buy-button-id="buy_btn_1NhtGVBzMqjLra0MUKWIG8gO"
  publishable-key="pk_test_51N2wCKBzMqjLra0MzROKqj2fAJeMwtGxpzkLXFE84vT2KgbZjVUz55UKFAkmzaPOzJSadTr7w6qg49GOSGaLy1sh00rY4EvQ2t"
>
</stripe-buy-button>
        </li>
      </ul>
    </div>
</div>
</div>

    <?php include_once "footer.php" ?>
</body>
</html>