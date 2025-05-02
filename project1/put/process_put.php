<?php
session_start();

$servername = "localhost"; 
$username = "root";  
$password = ""; 
$dbname = "webtech";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Read the raw input from the request
$input = file_get_contents('php://input');

// Extract the file name and content
if (preg_match('/filename="([^"]+)"/', $input, $matches)) {
    $fileName = $matches[1];
    $fileData = substr($input, strpos($input, "\r\n\r\n") + 4, -2);

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO uploads (filename, filepath) VALUES (?, ?)");
    $stmt->bind_param("sb", $fileName, $fileData);

    if ($stmt->execute()) {
        $_SESSION['file_name'] = $fileName;
        $_SESSION['file_data'] = $fileData;

        echo "File '$fileName' uploaded and saved to the database!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "No file uploaded.";
}

$conn->close();
?>