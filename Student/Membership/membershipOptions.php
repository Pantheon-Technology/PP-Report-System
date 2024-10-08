<?php
include_once "../../MenusAndFooter/parentMenu.php";
require_once "../../Utilities/paymentConfig.php"; 
$_SESSION['choice'] = true;
?>

<div class="w3-row-padding w3-center w3-padding-64" id="pricing">
    <h2>Membership Options</h2>
    <p>Choose a membership that works for you.</p><br>
      <script async src="https://js.stripe.com/v3/pricing-table.js"></script>
        <stripe-pricing-table pricing-table-id="prctbl_1NkpSRI8iyY9hSHqfsCIGjlz"
            publishable-key="pk_live_51LecHHI8iyY9hSHqXiizzlZhoRLyGQbLgMJrpeTPaLBpHHAQ8iwLyM79eyu5nn7DVYkrMbeQas59kamdC1oZHS1X00CTpmV7M3">
        </stripe-pricing-table>

</div>
</div>
    <?php include_once "../../MenusAndFooter/footer.php" ?>
</body>
</html>