<?php include_once "config.php";
include_once "teacherMenu.php"; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $stmt = $conn->prepare("INSERT INTO `timesheet` (`employee_name`, `date`, `hours_worked`, `project`, `confirmation`, `weekCommencing`) VALUES (?, ?, ?, ?, ?, ?)");

  $stmt->bind_param("ssssss", $employeeName, $date, $hoursWorked, $project, $confirmation, $week);

 

  // Get data from the form submission
  $employeeName = $_SESSION["teacherUsername"];
  $dates = $_POST["date"];
  $hoursWorkedArr = $_POST["hours_worked"];
  $projects = $_POST["project"];
  $confirmation = $_POST['confirmation'];
  $week = $_POST['weekCommencing'];


  // Loop through the submitted data and insert into the database
  for ($i = 0; $i < count($dates); $i++) {
      $date = $dates[$i];
      $hoursWorked = $hoursWorkedArr[$i];
      $project = $projects[$i];
      // Execute the prepared statement
      $stmt->execute();
  }
  if (mysqli_stmt_execute($stmt)){
    echo '<script>alert("Your timesheet has been added successfully!")</script>';
  }

}

?>

<script>
    function calculateTotalHours() {
      var totalHours = 0;
      var hoursInputs = document.querySelectorAll('input[name^="hours_worked[]"]');
      
      for (var i = 0; i < hoursInputs.length; i++) {
        if (hoursInputs[i].value !== '') {
          totalHours += parseFloat(hoursInputs[i].value);
        }
      }
      
      document.getElementById('total_hours').textContent = totalHours.toFixed(2);
    }

  </script>

<style>
  table {
    width: 100%;
    border-collapse: collapse;
  }

  th,
  td {
    padding: 8px;
    text-align: left;
  }

  /* Add media query for screens smaller than 600px */
  @media (max-width: 600px) {
    th,
    td {
      display: block;
      width: 100%;
    }

    th {
      text-align: center;
    }

    td:before {
      content: attr(data-label);
      float: left;
      font-weight: bold;
    }

    table tr {
      display: block;
      margin-bottom: 10px;
    }
  }
</style>

<!--Events tab -->
<div id="EVENTS" class="w3-panel w3-dark-grey w3-animate-right">

    <h1>Timesheet Form</h1>
    <p>Use the form below to enter your hours for this week. All timesheets must be submitted by 8pm Sunday for the week just worked.</p>
      <div class="w3-left-align w3-padding-large">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id="myForm">
      <p><b>Week Commencing (starting Monday)</b><input type="date" name="weekCommencing"  required></p>
    <table>
      <tr>
        <td><b>Monday</b></td>
        <td><input type="date" name="date[]"  ></td>
        <td><input type="number" name="hours_worked[]"   oninput="calculateTotalHours()"placeholder = "Hours worked - Morning"></td>
        <td>
          <select name="project[]"  >
            <option value="">Select a  work premises</option>
            <option value="ASFA">ASFA</option>
            <option value="The Heath">The Heath</option>
            <option value="South Liverpool">South Liverpool</option>
            <option value="West Derby">West Derby</option>
            <option value="Online">Online</option>
            <option value="Other">Other</option>
          </select>
        </td>
        <td><input type="number" name="hours_worked[]"oninput="calculateTotalHours()" placeholder = "Hours worked - Afternoon"></td>
        <td>
          <select name="project[]"  >
            <option value="">Select a  work premises</option>
            <option value="ASFA">ASFA</option>
            <option value="The Heath">The Heath</option>
            <option value="South Liverpool">South Liverpool</option>
            <option value="West Derby">West Derby</option>
            <option value="Online">Online</option>
            <option value="Other">Other</option>
          </select>
        </td>
        <td><input type="number" name="hours_worked[]"   oninput="calculateTotalHours()" placeholder = "Hours worked - Evening"></td>
        <td>
          <select name="project[]"  >
            <option value="">Select a  work premises</option>
            <option value="ASFA">ASFA</option>
            <option value="The Heath">The Heath</option>
            <option value="South Liverpool">South Liverpool</option>
            <option value="West Derby">West Derby</option>
            <option value="Online">Online</option>
            <option value="Other">Other</option>
          </select>
        </td>
      </tr>

      <tr>
        <td><b>Tuesday</b></td>
        <td><input type="date" name="date[]"  ></td>
        <td><input type="number" name="hours_worked[]"   oninput="calculateTotalHours()"placeholder = "Hours worked - Morning"></td>
        <td>
          <select name="project[]"  >
            <option value="">Select a  work premises</option>
            <option value="ASFA">ASFA</option>
            <option value="The Heath">The Heath</option>
            <option value="South Liverpool">South Liverpool</option>
            <option value="West Derby">West Derby</option>
            <option value="Online">Online</option>
            <option value="Other">Other</option>
          </select>
        </td>
        <td><input type="number" name="hours_worked[]"   oninput="calculateTotalHours()" placeholder = "Hours worked - Afternoon"></td>
        <td>
          <select name="project[]"  >
            <option value="">Select a  work premises</option>
            <option value="ASFA">ASFA</option>
            <option value="The Heath">The Heath</option>
            <option value="South Liverpool">South Liverpool</option>
            <option value="West Derby">West Derby</option>
            <option value="Online">Online</option>
            <option value="Other">Other</option>
          </select>
        </td>
        <td><input type="number" name="hours_worked[]"   oninput="calculateTotalHours()" placeholder = "Hours worked - Evening"></td>
        <td>
          <select name="project[]"  >
            <option value="">Select a  work premises</option>
            <option value="ASFA">ASFA</option>
            <option value="The Heath">The Heath</option>
            <option value="South Liverpool">South Liverpool</option>
            <option value="West Derby">West Derby</option>
            <option value="Online">Online</option>
            <option value="Other">Other</option>
          </select>
        </td>
      </tr>

      <tr>
        <td><b>Wednesday</b></td>
        <td><input type="date" name="date[]"  ></td>
        <td><input type="number" name="hours_worked[]"   oninput="calculateTotalHours()" placeholder = "Hours worked - Morning"></td>
        <td>
          <select name="project[]"  >
            <option value="">Select a  work premises</option>
            <option value="ASFA">ASFA</option>
            <option value="The Heath">The Heath</option>
            <option value="South Liverpool">South Liverpool</option>
            <option value="West Derby">West Derby</option>
            <option value="Online">Online</option>
            <option value="Other">Other</option>
          </select>
        </td>
        <td><input type="number" name="hours_worked[]"   oninput="calculateTotalHours()" placeholder = "Hours worked - Afternoon"></td>
        <td>
          <select name="project[]"  >
            <option value="">Select a  work premises</option>
            <option value="ASFA">ASFA</option>
            <option value="The Heath">The Heath</option>
            <option value="South Liverpool">South Liverpool</option>
            <option value="West Derby">West Derby</option>
            <option value="Online">Online</option>
            <option value="Other">Other</option>
          </select>
        </td>
        <td><input type="number" name="hours_worked[]"   oninput="calculateTotalHours()" placeholder = "Hours worked - Evening"></td>
        <td>
          <select name="project[]"  >
            <option value="">Select a  work premises</option>
            <option value="ASFA">ASFA</option>
            <option value="The Heath">The Heath</option>
            <option value="South Liverpool">South Liverpool</option>
            <option value="West Derby">West Derby</option>
            <option value="Online">Online</option>
            <option value="Other">Other</option>
          </select>
        </td>
      </tr>
     
      <tr>
        <td><b>Thursday</b></td>
        <td><input type="date" name="date[]"  ></td>
        <td><input type="number" name="hours_worked[]"   oninput="calculateTotalHours()" placeholder = "Hours worked - Morning"></td>
        <td>
          <select name="project[]"  >
            <option value="">Select a  work premises</option>
            <option value="ASFA">ASFA</option>
            <option value="The Heath">The Heath</option>
            <option value="South Liverpool">South Liverpool</option>
            <option value="West Derby">West Derby</option>
            <option value="Online">Online</option>
            <option value="Other">Other</option>
          </select>
        </td>
        <td><input type="number" name="hours_worked[]"   oninput="calculateTotalHours()" placeholder = "Hours worked - Afternoon"></td>
        <td>
          <select name="project[]"  >
            <option value="">Select a  work premises</option>
            <option value="ASFA">ASFA</option>
            <option value="The Heath">The Heath</option>
            <option value="South Liverpool">South Liverpool</option>
            <option value="West Derby">West Derby</option>
            <option value="Online">Online</option>
            <option value="Other">Other</option>
          </select>
        </td>
        <td><input type="number" name="hours_worked[]"   oninput="calculateTotalHours()" placeholder = "Hours worked - Evening"></td>
        <td>
          <select name="project[]"  >
            <option value="">Select a  work premises</option>
            <option value="ASFA">ASFA</option>
            <option value="The Heath">The Heath</option>
            <option value="South Liverpool">South Liverpool</option>
            <option value="West Derby">West Derby</option>
            <option value="Online">Online</option>
            <option value="Other">Other</option>
          </select>
        </td>
      </tr>

      <tr>
        <td><b>Friday</b></td>
        <td><input type="date" name="date[]"  ></td>
        <td><input type="number" name="hours_worked[]"   oninput="calculateTotalHours()" placeholder = "Hours worked - Morning"></td>
        <td>
          <select name="project[]"  >
            <option value="">Select a  work premises</option>
            <option value="ASFA">ASFA</option>
            <option value="The Heath">The Heath</option>
            <option value="South Liverpool">South Liverpool</option>
            <option value="West Derby">West Derby</option>
            <option value="Online">Online</option>
            <option value="Other">Other</option>
          </select>
        </td>
        <td><input type="number" name="hours_worked[]"   oninput="calculateTotalHours()" placeholder = "Hours worked - Afternoon"></td>
        <td>
          <select name="project[]"  >
            <option value="">Select a  work premises</option>
            <option value="ASFA">ASFA</option>
            <option value="The Heath">The Heath</option>
            <option value="South Liverpool">South Liverpool</option>
            <option value="West Derby">West Derby</option>
            <option value="Online">Online</option>
            <option value="Other">Other</option>
          </select>
        </td>
        <td><input type="number" name="hours_worked[]"   oninput="calculateTotalHours()" placeholder = "Hours worked - Evening"></td>
        <td>
          <select name="project[]"  >
            <option value="">Select a  work premises</option>
            <option value="ASFA">ASFA</option>
            <option value="The Heath">The Heath</option>
            <option value="South Liverpool">South Liverpool</option>
            <option value="West Derby">West Derby</option>
            <option value="Online">Online</option>
            <option value="Other">Other</option>
          </select>
        </td>
      </tr>

      <tr>
        <td><b>Saturday</b></td>
        <td><input type="date" name="date[]"  ></td>
        <td><input type="number" name="hours_worked[]"   oninput="calculateTotalHours()" placeholder = "Hours worked - Morning"></td>
        <td>
          <select name="project[]"  >
            <option value="">Select a  work premises</option>
            <option value="ASFA">ASFA</option>
            <option value="The Heath">The Heath</option>
            <option value="South Liverpool">South Liverpool</option>
            <option value="West Derby">West Derby</option>
            <option value="Online">Online</option>
            <option value="Other">Other</option>
          </select>
        </td>
        <td><input type="number" name="hours_worked[]"   oninput="calculateTotalHours()" placeholder = "Hours worked - Afternoon"></td>
        <td>
          <select name="project[]"  >
            <option value="">Select a  work premises</option>
            <option value="ASFA">ASFA</option>
            <option value="The Heath">The Heath</option>
            <option value="South Liverpool">South Liverpool</option>
            <option value="West Derby">West Derby</option>
            <option value="Online">Online</option>
            <option value="Other">Other</option>
          </select>
        </td>
        <td><input type="number" name="hours_worked[]"   oninput="calculateTotalHours()" placeholder = "Hours worked - Evening"></td>
        <td>
          <select name="project[]"  >
            <option value="">Select a  work premises</option>
            <option value="ASFA">ASFA</option>
            <option value="The Heath">The Heath</option>
            <option value="South Liverpool">South Liverpool</option>
            <option value="West Derby">West Derby</option>
            <option value="Online">Online</option>
            <option value="Other">Other</option>
          </select>
        </td>
      </tr>

      <tr>
        <td><b>Sunday</b></td>
        <td><input type="date" name="date[]"  ></td> 
        <td><input type="number" name="hours_worked[]"   oninput="calculateTotalHours()" placeholder = "Hours worked - Morning"></td>
        <td>
          <select name="project[]"  >
            <option value="">Select a  work premises</option>
            <option value="ASFA">ASFA</option>
            <option value="The Heath">The Heath</option>
            <option value="South Liverpool">South Liverpool</option>
            <option value="West Derby">West Derby</option>
            <option value="Online">Online</option>
            <option value="Other">Other</option>
          </select>
        </td>
        <td><input type="number" name="hours_worked[]"   oninput="calculateTotalHours()" placeholder = "Hours worked - Afternoon"></td>
        <td>
          <select name="project[]"  >
            <option value="">Select a  work premises</option>
            <option value="ASFA">ASFA</option>
            <option value="The Heath">The Heath</option>
            <option value="South Liverpool">South Liverpool</option>
            <option value="West Derby">West Derby</option>
            <option value="Online">Online</option>
            <option value="Other">Other</option>
          </select>
        </td>
        <td><input type="number" name="hours_worked[]"   oninput="calculateTotalHours()" placeholder = "Hours worked - Evening"></td>
        <td>
          <select name="project[]"  >
            <option value="">Select a  work premises</option>
            <option value="ASFA">ASFA</option>
            <option value="The Heath">The Heath</option>
            <option value="South Liverpool">South Liverpool</option>
            <option value="West Derby">West Derby</option>
            <option value="Online">Online</option>
            <option value="Other">Other</option>
          </select>
        </td>
      </tr>

    </table>

    <br>
    <label>Total Hours Worked:</label>
    <span id="total_hours" name="total_hours">0.00</span>

    <p>Do you declare that all dates and times are correct to the best of your knowledge?*</p>
      <p><input type="radio" id="yes1"   name="confirmation" value="Yes">
      <label for="yes1">Yes</label></p>

    <input type="submit" value="Submit">
  </form>

   </div>
 </div>
 <?php include_once "footer.php" ?>
</body>
</html>