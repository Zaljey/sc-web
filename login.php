<?php
// Start the session
session_start();

include_once("php/db_connection.php");

// Initialize the error variable
$error = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user input
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];

    // Query the database
    $query = "SELECT * FROM users WHERE username = '$username' AND usertype = '$usertype'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $storedPassword = $user['password'];

        // Compare passwords
        if ($password === $storedPassword) {
            // Login successful

            // Set session variables
            $_SESSION['username'] = $username;
            $_SESSION['usertype'] = $usertype;

            // Redirect to the appropriate dashboard
            switch ($usertype) {
                case 'customer':
                    header("Location: customer_dashboard.php");
                    break;
                case 'staff':
                    header("Location: staff_dashboard.php");
                    break;
                case 'admin':
                    header("Location: admin_dashboard.php");
                    break;
                default:
                    echo "Invalid user type";
                    break;
            }

            exit();
        } else {
            $error = "Invalid password";
        }
    } else {
        $error = "Invalid username, password, or user type.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
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
                <li><a href="menu.php">Menu</a></li>
                <li><a href="facilities.php">Facilities</a></li>
                <li><a href="reservation.php">Reservation</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="index.php">Login</a></li>

            </ul>
        </nav>
    </header>
    <main>
        <section class="login-form">
            <h2>Login</h2>
            <?php
            if (isset($error)) {
                echo "<p class='error'>$error</p>";
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <label for="usertype">User Type:</label>
                <select id="usertype" name="usertype" required>
                    <option value="customer">Customer</option>
                    <option value="admin">Admin</option>
                    <option value="staff">Staff</option>
                </select>

                <button type="submit">Login</button>
            </form>
        </section>
    </main>

     <!-- Contact Section -->
     <section class="contact">
            <h2>Contact Us</h2>
            <p>For inquiries, please contact us:</p>
            <ul>
                <li>Phone: +1 (123) 456-7890</li>
                <li>Email: info@outerclove.com</li>
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
