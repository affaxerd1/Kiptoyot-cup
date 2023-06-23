<?php
include_once "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {


    $team_name=$_POST['team_name'];
    $selected_constituency = $_POST['constituency'];
    $selected_ward = $_POST['ward'];

    if (empty($team_name || $selected_constituency || $selected_ward)) {
        $error = "Please select an option.";
    }

        // Prepare and execute an SQL INSERT statement
        $stmt = $conn->prepare("INSERT INTO teams (name, constituency, ward) VALUES (?,?,?)");
        $stmt->bind_param("sss",$team_name, $selected_constituency,  $selected_ward);
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

    else{
        echo "error";
    }

?>