<?php
// Initialize error variables
$selectedValueError = $textInputError = '';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the submitted values
    $selectedValue = $_POST['mySelect'];
    $textInput = $_POST['textInput'];

    // Validate if the values are empty
    if (empty($selectedValue)) {
        $selectedValueError = "Please select an option.";
    }

    if (empty($textInput)) {
        $textInputError = "Please enter a value.";
    }

    // If there are no errors, proceed with database insertion
    if (empty($selectedValueError) && empty($textInputError)) {
        // Establish a database connection (replace 'hostname', 'username', 'password', and 'database' with your actual database credentials)
        $conn = new mysqli('hostname', 'username', 'password', 'database');

        // Check for any connection errors
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        // Prepare and execute an SQL INSERT statement
        $stmt = $conn->prepare("INSERT INTO your_table_name (column1, column2) VALUES (?, ?)");
        $stmt->bind_param("ss", $selectedValue, $textInput);
        $stmt->execute();

        // Check if the insert was successful
        if ($stmt->affected_rows > 0) {
            echo "Values inserted successfully!";
        } else {
            echo "Error inserting values: " . $stmt->error;
        }

        // Close the statement and database connection
        $stmt->close();
        $conn->close();
    }
}
?>

<!-- Display the form and error messages (if any) -->
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label for="mySelect">Select an option:</label>
    <select name="mySelect" id="mySelect">
        <option value="">Select an option</option>
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
    </select>
    <span class="error"><?php echo $selectedValueError; ?></span>
    <br>
    <label for="textInput">Enter a value:</label>
    <input type="text" name="textInput" id="textInput">
    <span class="error"><?php echo $textInputError; ?></span>
    <br>
    <button type="submit">Submit</button>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Show the notification if it is not empty
        if ($("#notification").text().trim() !== "") {
            $("#notification").slideDown().delay(2000).slideUp();
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
      const notificationElement = document.getElementById('notification');

      <?php if (isset($successMessage)) : ?>
        showNotification('<?php echo $successMessage; ?>', 'success');
      <?php endif; ?>

      <?php if (isset($errorMessage)) : ?>
        showNotification('<?php echo $errorMessage; ?>', 'error');
      <?php endif; ?>

      function showNotification(message, type) {
        notificationElement.textContent = message;
        notificationElement.classList.add(type);
        notificationElement.style.display = 'block';

        setTimeout(() => {
          hideNotification();
        }, 5000);
      }

      function hideNotification() {
        notificationElement.style.display = 'none';
        notificationElement.classList.remove('success', 'error');
        notificationElement.textContent = '';
      }
    });
  </script>

  // corrrect
  <script>
    window.addEventListener('DOMContentLoaded', (event) => {
        // Get the notification element
        var notificationElement = document.getElementById('notification');

        // Check if a notification is set
        <?php if (isset($notification)) : ?>
            // Set the notification content
            notificationElement.innerHTML = '<?php echo $notification; ?>';

            // Show the notification element
            notificationElement.style.display = 'block';
        <?php endif; ?>
    });
</script>