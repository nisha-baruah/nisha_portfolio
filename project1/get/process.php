<?php
// Checking if the 'name' parameter is set in the URL
if (isset($_GET['name'])) {
    $name = htmlspecialchars($_GET['name']); // Sanitizing the input
    header("Location: result.php?name=" . urlencode($name)); 
    exit();
} else {
    header("Location: get.html");
    exit();
}
?>