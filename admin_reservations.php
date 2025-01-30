<?php
include_once("php/db_connection.php");

// Fetch all reservations from the database
$queryReservations = "SELECT * FROM reservations";
$resultReservations = $conn->query($queryReservations);

// Process the result
$reservations = $resultReservations->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Reservations - The Signature Cuisine Restaurant</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Header Section -->
    <!-- Header Section -->
    <header>
        <h1>The Signature Cuisine Restaurant</h1>
        <!-- Navigation Bar -->
        <nav>
            <ul>
                <li><a href="admin_dashboard.php">Dashboard</a></li>
                <li><a href="add_promotion.php">Add Promotion</a></li>
                <li><a href="delete_promotion.php">Delete Promotion</a></li>
                <li><a href="manage_users.php">Manage Users</a></li>
                <li><a href="admin_reservations.php">Manage Reservation</a></li>
                <li><a href="index.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Section -->
    <main>
        <!-- Display Reservations Table for Admin -->
        <section class='admin-reservations'>
            <h2>Admin Reservations</h2>

            <!-- Display Reservations in a Table -->
            <table>
                <tr>
                    <th>ID</th>
                    <th>Event Space</th>
                    <th>Table</th>
                    <th>Date</th>
                    <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Approved</th>
                    <th>Action</th>
                </tr>
                <?php
                foreach ($reservations as $reservation) {
                    echo "<tr>";
                    echo "<td>{$reservation['id']}</td>";
                    echo "<td>{$reservation['event_space_id']}</td>";
                    echo "<td>{$reservation['table_name']}</td>";
                    echo "<td>{$reservation['reservation_date']}</td>";
                    echo "<td>{$reservation['customer_name']}</td>";
                    echo "<td>{$reservation['customer_email']}</td>";
                    echo "<td>" . ($reservation['is_approved'] ? 'Yes' : 'No') . "</td>";
                    echo "<td><a href='edit_reservation.php?id={$reservation['id']}'>Edit</a> | <a href='delete_reservation.php?id={$reservation['id']}'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </section>
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
