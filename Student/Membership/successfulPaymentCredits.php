<html>
<meta charset="UTF-8">
<?php require_once "paymentConfig.php";
require_once "parentMenu.php";
require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $price = $_POST['price'];
    $credits = $_POST['credits'];
    // Set the session variables
    $_SESSION['totalPrice'] = $price;
    $_SESSION['credits'] = $credits;


}

$sql = "UPDATE `parents` SET `credits` = `credits` + ? WHERE parentUsername = '$username'";
    if ($stmt = mysqli_prepare($conn, $sql)) {

    mysqli_stmt_bind_param($stmt, "i", $param_credits);

    $param_credits = $credits;

    if (!mysqli_stmt_execute($stmt)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_stmt_close($stmt);
    }
$conn->close();

if (isset($_POST['stripeToken'])) {

    $token = $_POST['stripeToken'];
    $email = $_POST['stripeEmail'];

    $customer = \Stripe\Customer::create([
        'source' => $token,
        'email' => $email
    ]);

    $charge = \Stripe\Charge::create([
        "customer" => $customer->id,
        "amount" => $price * 100,
        "currency" => "gbp"
    ]);
}
    
?>
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:70px">
<h1 class="w3-center"> Thank you for your purchase <b><?php echo $username;?></b>! </h1>
<p class="w3-center"> An email confirmation of your positive pennies will be sent to you shortly. Why not begin browsing our courses below?</p>

<div class="w3-center">
<a href="courseList.php"><div class="w3-round  w3-hover-opacity w3-orange w3-margin-left w3-margin-bottom">
        <h2><i class="fa fa-graduation-cap"></i></h2>
        <p>Course List</p>
      </div>
      </a>
</div>
</div>
</body>
</html>
