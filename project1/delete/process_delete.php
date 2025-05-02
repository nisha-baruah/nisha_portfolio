<?php
session_start();

$servername = "localhost"; 
$username = "root";  
$password = ""; 
$dbname = "webtech";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted as DELETE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["_method"]) && $_POST["_method"] == "DELETE") {
    
    $filename = $_POST["filename"];

    // Get file path from the database
    $stmt = $conn->prepare("SELECT filepath FROM uploads WHERE filename = ?");
    $stmt->bind_param("s", $filename);
    $stmt->execute();
    $stmt->bind_result($filePath);
    $stmt->fetch();
    $stmt->close();

    if ($filePath) {
        // Delete the file from the server
        if (unlink($filePath)) {
            // Remove the entry from the database
            $stmt = $conn->prepare("DELETE FROM uploads WHERE filename = ?");
            $stmt->bind_param("s", $filename);

            if ($stmt->execute()) {
                echo "File deleted successfully!";
            } else {
                echo "Error deleting file from database.";
            }

            $stmt->close();
        } else {
            echo "Error deleting file from server.";
        }
    } else {
        echo "File not found in database.";
    }
} else {
    echo "Invalid request."; 
}

$conn->close();
?>
