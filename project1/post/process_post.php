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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['sid'], $_POST['sname'], $_POST['email'], $_POST['mobile'])) {
        
        $sid = htmlspecialchars($_POST['sid']);
        $sname = htmlspecialchars($_POST['sname']);
        $email = htmlspecialchars($_POST['email']);
        $mobile = htmlspecialchars($_POST['mobile']);

        $sql = "INSERT INTO student (sid, sname, email, mobile) VALUES ('$sid', '$sname', '$email', '$mobile')";

        if ($stmt->execute()) {
            $_SESSION['sid'] = $sid;
            $_SESSION['sname'] = $sname;
            $_SESSION['email'] = $email;
            $_SESSION['mobile'] = $mobile;
            
            header("Location: result_post.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        header("Location: post.html");
        exit();
    }
}

$conn->close();
?>
