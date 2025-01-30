<?php
include_once("php/db_connection.php");

// Fetch about us information from the database
$query = "SELECT * FROM about_us";
$result = $conn->query($query);

// Process the result
$aboutUsData = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - The Signature Cuisine Restaurant</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Header Section -->
    <header>
        <h1>The Signature Cuisine Restaurant</h1>
        <!-- Navigation Bar -->
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="index.php#menu">Menu</a></li>
                <li><a href="facilities.php">Facilities</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Section -->
    <main>
        <!-- Display About Us Content -->
        <section class="about-us">
            <h2>About Us</h2>
            <?php
                // Display about us content
                echo "<div class='about-content'>";
                echo "<h3>{$aboutUsData['title']}</h3>";
                echo "<p>{$aboutUsData['content']}</p>";
                echo "<img src='{$aboutUsData['image_url']}' alt='About Us Image'>";
                echo "</div>";
            ?>
        </section>

        <!-- Other Sections as Needed -->

    </main>
<!-- Contact Section -->
<section class="contact">
            <h2>Contact Us</h2>
            <p>For inquiries, please contact us:</p>
            <ul>
                <li>Phone: +1 (123) 456-7890</li>
                <li>Email: info@SignatureCuisine.com</li>
            </ul>
            
            <!-- Google Map -->
            <div class="google-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14373.641167234913!2d89.2386298!3d25.7570082!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e331a88dec61d9%3A0x89ca82231e9e0dd7!2sSignature%20Cuisine!5e0!3m2!1sen!2slk!4v1718640673678!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2023 The Signature Cuisine Restaurant. All rights reserved.</p>
    </footer>
</body>
</html>
