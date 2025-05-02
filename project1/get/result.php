<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Page</title>
    <link rel="stylesheet" href="get.css">
    <link rel="stylesheet" href="../../style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav>
        <div class="container">
            <a href="index.html" class="logo">Get <span>Method</span></a>
            
        </div>
    </nav>

    <!-- Result Section -->
    <section class="result">
        <div class="container">
            <h2>Result</h2>
            <?php
                if (isset($_GET['name'])) {
                    $name = htmlspecialchars($_GET['name']);
                    echo "<p>Hello, <strong>$name</strong>! Welcome to the result page.</p>";
                } else {
                    echo "<p>No name provided! Please go back and enter your name.</p>";
                }
            ?>
            <a href="get.html" class="btn">Go Back</a>
        </div>
    </section>

    <!-- Footer -->
    <!-- <footer>
        <div class="container">
            <p>&copy; 2023 Your Name. All rights reserved.</p>
            <div class="social-links">
                <a href="#"><i class="fab fa-github"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </footer> -->
</body>
</html>