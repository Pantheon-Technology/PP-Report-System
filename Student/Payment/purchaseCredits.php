<?php
include_once "../../MenusAndFooter/parentMenu.php";
require_once "../../Utilities/paymentConfig.php";
?>

<div class="w3-row-padding w3-center w3-padding-64" id="pricing">
    <h2>Purchase Positive Pennies</h2>
    <p>Choose an option below to purchase credits. These can be used to purchase classes in the course list section.</p><br>

    <?php
    $pricingOptions = [
        ['price' => 12, 'credits' => 24],
        ['price' => 24, 'credits' => 48],
        ['price' => 36, 'credits' => 72],
    ];

    foreach ($pricingOptions as $option) {
        $price = $option['price'];
        $credits = $option['credits'];
    ?>

        <div class="w3-third w3-margin-bottom">
            <ul class="w3-ul w3-border w3-hover-shadow w3-teal w3-round">
                <li class="w3-theme">
                    <h2 class="w3-wide">£<?php echo $price; ?> for <?php echo $credits; ?> Positive Pennies</h2>
                </li>
                <li class="w3-theme-l5 w3-padding-24">
                    <form action="successfulPaymentCredits.php" method="post">
                    <input type="hidden" name="price" value="<?php echo $price ?>">
                         <input type="hidden" name="credits" value="<?php echo $credits ?>">
                        <script type="text/javascript" src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="<?php echo $test_keys['publishable_key']; ?>"
                                data-name="Positive Pennies Payment"
                                data-description="Thank you for your purchase!"
                                data-image="https://mypositiveprogress.co.uk/Pictures/logo.png"
                                data-amount="<?php echo $price * 100; ?>"
                                data-currency="gbp"
                                data-email="">
                        </script>
                    </form>
                </li>
            </ul>
        </div>

    <?php
    }
    ?>
</div>
  </div>
<?php include_once "../../MenusAndFooter/footer.php" ?>
</body>
</html>