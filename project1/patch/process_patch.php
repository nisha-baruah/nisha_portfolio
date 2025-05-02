<?php
// Start the session
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webtech"; // Change this to your actual database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Only allow PATCH requests
if ($_SERVER["REQUEST_METHOD"] == "PATCH") {
    // Read JSON input
    $input = json_decode(file_get_contents("php://input"), true);

    // Check if sid and email are provided
    if (isset($input['sid'], $input['email'])) {
        // Sanitize inputs
        $sid = htmlspecialchars($input['sid']);
        $email = htmlspecialchars($input['email']);

        // Prepare and execute the SQL UPDATE statement
        $stmt = $conn->prepare("UPDATE student SET email = ? WHERE sid = ?");
        $stmt->bind_param("ss", $email, $sid);

        if ($stmt->execute()) {
            echo "Student email updated successfully.";
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Invalid input data.";
    }
}

$conn->close();
?>
