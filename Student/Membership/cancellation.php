<?php include_once "../../MenusAndFooter/parentMenu.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $_SESSION['childName'] = trim($_POST['name']);
  $_SESSION['totalPrice'] = trim($_POST['subscription']);
  $_SESSION['reason'] = trim($_POST['reason']);

  header("location: ../Payment/processPayment.php");
}
?>
      <h1>Cancellation Request</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Child Full Name*" required name="name"></p>
      
                <label for="sub">Subscription Type</label>
            <select id="sub" name="subscription">
                <option value="100">Pay as you go Subscription</option>
                <option value="85">KS1/2 Single Subject</option>
                <option value="170">KS1/2 Dual Subject</option>
                <option value="105">KS3 Single Subject</option>
                <option value="210">KS3 Dual Subject</option>
                <option value="315">KS3 Triple Subject</option>
                <option value="120">KS4 Single Subject</option>
                <option value="240">KS4 Dual Subject</option>
                <option value="360">KS4 Triple Subject</option>
                <option value="140">KS5 Single Subject</option>
                <option value="280">KS5 Dual Subject</option>
                <option value="420">KS5 Triple Subject</option>
            </select>

      <p><textarea class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Reason for Cancellation*" required name="reason"></textarea></p>

      <p><button type="submit">Proceed To Cancellation Payment</button></p>
    
</form>
</div>
  
    </div>
  </div>
<?php include_once "../../MenusAndFooter/footer.php" ?>
</body>
</html>