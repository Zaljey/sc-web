<?php
include_once("php/db_connection.php");

// Fetch promotions from the database
$query = "SELECT * FROM promotions";
$result = $connect->query($query);

// Process the result
$promotions = [];
while ($row = $result->fetch_assoc()) {
    $promotions[] = $row;
}



// Fetch menu items from the database
$query = "SELECT * FROM menu_items";
$result = $connect->query($query);

// Process the result
$menuItems = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Outer Clove Restaurant</title>
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
                <!-- Add links to other pages as needed -->
                <li><a href="about.php">About Us</a></li>
                <li><a href=#menu>Menu</a></li>
                <li><a href="facilities.php">Facilities</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="login.php">Login</a></li>

            </ul>
        </nav>
    </header>

    <!-- Main Section -->
    <main>
        <!-- Display Promotions -->
        <section class="promotions">
            <h2>Current Promotions</h2>
            <?php
                // Display promotions
                foreach ($promotions as $promotion) {
                    echo "<div class='promotion'>";
                    echo "<img src='{$promotion['image_url']}' alt='{$promotion['title']}'>";
                    echo "<h3>{$promotion['title']}</h3>";
                    echo "<p>{$promotion['description']}</p>";
                    echo "</div>";
                }
            ?>
        </section>

    </main>

       <!-- Main Section -->
       <main>
        <!-- Display Menu Items -->
        <section id="menu">
            <h2>Our Menu</h2>
            <?php
                // Display menu items
                foreach ($menuItems as $menuItem) {
                    echo "<div class='menu-item'>";
                    echo "<img src='{$menuItem['image_url']}' alt='{$menuItem['name']}'>";
                    echo "<h3>{$menuItem['name']}</h3>";
                    echo "<p>{$menuItem['description']}</p>";
                    echo "<p class='price'>$ {$menuItem['price']}</p>";
                    echo "</div>";
                }
            ?>
        </section>
            </main>

    <!-- Contact Section -->
    <section class="contact">
            <h2>Contact Us</h2>
            <p>For inquiries, please contact us:</p>
            <ul>
                <li>Phone: +1 (123) 456-7890</li>
                <li>Email: info@SignatureCuisine</li>
            </ul>
            
            <!-- Google Map -->
            <div class="google-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14373.641167234913!2d89.2386298!3d25.7570082!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e331a88dec61d9%3A0x89ca82231e9e0dd7!2sSignature%20Cuisine!5e0!3m2!1sen!2slk!4v1718640673678!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <!-- Footer Section -->
    <footer>
        <p>&copy; 2023 The Signature Cuisine Restaurant. All rights reserved.</p>
    </footer>
</body>
</html>
