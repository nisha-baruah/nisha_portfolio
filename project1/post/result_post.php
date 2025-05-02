<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST Result</title>
    <link rel="stylesheet" href="../../style.css"> <!-- Correct path to CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav>
        <div class="container">
            <a href="../index.html" class="logo">My<span>Portfolio</span></a>
            <!-- <ul>
                <li><a href="../index.html#about">About</a></li>
                <li><a href="../index.html#skills">Skills</a></li>
                <li><a href="../index.html#projects">Projects</a></li>
                <li><a href="../index.html#contact">Contact</a></li>
            </ul> -->
        </div>
    </nav>

    <!-- Result Section -->
    <section class="result">
        <div class="container">
            <h2>Result</h2>
            <?php
            // Start the session to retrieve data
            session_start();
            if (isset($_SESSION['email'])) {
                $email = htmlspecialchars($_SESSION['email']);
                echo "<p>Thank you! Your data <strong>$email</strong> has been received.</p>";
                // Clear the session data
                unset($_SESSION['email']);
            } else {
                echo "<p>Record not updated.</p>";
            }
            ?>
            <a href="post.html" class="btn">Go Back</a>
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