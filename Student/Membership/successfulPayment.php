<html>
<meta charset="UTF-8">
<?php 
require_once "../../Utilities/paymentConfig.php";
require_once "../../MenusAndFooter/parentMenu.php";

$total_price = $_SESSION['totalPrice'];

if (isset($_POST['stripeToken'])) {

    $token = $_POST['stripeToken'];
    $email = $_POST['stripeEmail'];

    $customer = \Stripe\Customer::create([
        'source' => $token,
        'email' => $email
    ]);

    $charge = \Stripe\Charge::create([
        "customer" => $customer->id,
        "amount" => $total_price * 100,
        "currency" => "gbp"
    ]);
}
   
    $sql = "INSERT INTO `cancellations` (`studentName`, `comments`) VALUES (?,?);";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ss", $param_studentName, $param_comments);
        
        $param_studentName = $_SESSION['childName'];
        $param_comments = $_SESSION['reason'];
        
        if (!(mysqli_stmt_execute($stmt))) {
            echo "Error: " . $sql1 . "<br>" . $conn->error;
        }
    }mysqli_stmt_close($stmt);
$conn->close();

?>
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:70px">
<h1 class="w3-center"> We are Sorry to see you go <b><?php echo $_SESSION['parentUsername'];?></b>! </h1>
<p class="w3-center"> An email confirmation of your cancellation will be sent to you shortly. Please ensure you have downloaded any files you have with us as these will be deleted after the subscription ends.</p>

<div class="w3-center">
<a href="../Reports/viewReport.php"><div class="w3-quarter w3-green w3-margin-left w3-margin-bottom">
        <h2><i class="fa fa-archive"></i></h2>
        <p>View Uploads</p>
      </div>
      </a>

<div class="w3-center">
<a href="../parentHome.php"><div class="w3-quarter w3-orange w3-margin-left w3-margin-bottom">
        <h2><i class="fa fa-home"></i></h2>
        <p>Return To Homepage</p>
      </div>
      </a>
</div>
</div>
</body>
</html>
