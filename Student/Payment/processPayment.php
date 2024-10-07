<html>
    <head>
        <title>Stripe Payment</title>
        <?php include_once "../../MenusAndFooter/parentMenu.php"; ?>
    </head>
<body>
    <?php require_once "../../Utilities/paymentConfig.php"; 
    $total_price = $_SESSION['totalPrice'];
    ?>
    <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:70px">
<div class="w3-center">
    <h1 class="w3-center"> Press the button below to proceed to payment!</h1>
    <form action="../Membership/successfulPayment.php" method="post">
    <script type="text/javascript" src="https://checkout.stripe.com/checkout.js" class="stripe-button"
         data-key="<?php echo $test_keys['publishable_key']; ?>"
        data-name="Positive Progress Cancellation Payment"
        data-description="Sorry to see you leave us!"
        data-image="https://mypositiveprogress.co.uk/Pictures/logo.png"
        data-amount="<?php echo $total_price * 100; ?>"
        data-currency="gbp"
        data-email="accounts@positive-progress.co.uk">

        </script>
    </form>
</div>
</div>
</body>
</html>