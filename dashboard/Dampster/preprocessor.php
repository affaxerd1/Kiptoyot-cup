<?php


// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the submitted value
    $selectedValue = $_POST['mySelect'];


    // Validate if the value is empty
   c

    // If there are no errors, proceed with database insertion
    if (!isset($error)) {
        // Establish a database connection (replace 'hostname', 'username', 'password', and 'database' with your actual database credentials)
        $conn = new mysqli('localhost', 'root', '', 'database');

        // Check for any connection errors
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        // Prepare and execute an SQL INSERT statement
        $stmt = $conn->prepare("INSERT INTO db (ward) VALUES (?)");
        $stmt->bind_param("s", $selectedValue);
        $stmt->execute();

        // Check if the insert was successful
        if ($stmt->affected_rows > 0) {
            echo "Value inserted successfully!";
        } else {
            echo "Error inserting value: " . $stmt->error;
        }

        // Close the statement and database connection
        $stmt->close();
        $conn->close();
    }
}
?>

<!-- Display the form and error message (if any) -->
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label for="mySelect">Select an option:</label>
    <select name="mySelect" id="mySelect">
        <option disabled selected value="">default</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
    </select>
    <button type="submit">Submit</button>
    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
</form>