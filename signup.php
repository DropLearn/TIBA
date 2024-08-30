<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "TibaPharmacyStore"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $surName = $_POST['surName'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Securely hash the password
    $phone = $_POST['phone'];
    $location = $_POST['location'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO Users (firstName, surName, email, password, phone, location) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssis", $firstName, $surName, $email, $password, $phone, $location);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Tiba Pharmacy Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <div class="top-section">
        <div class="sliding-text">Welcome to Tiba Pharmacy Store</div>
        <div class="links">
            <a href="index.html">Home</a>
            <a href="about.html">About Us</a>
            <a href="contact.html">Contact Us</a>
            <a href="faq.html">FAQ</a>
            <a href="catalog.html">View Catalog</a> <!-- Added link to new catalog page -->

        </div>
    </div>
    <div class="navbar">
        <div class="brand-name"><a href="index.html">Tiba Pharmacy Store</a></div>
        <div class="search-bar">
            <input type="text" placeholder="Search for medicines..." id="search">
        </div>
        <div class="account-cart">
            <div class="account">
                <a href="login.html">Account</a>
            </div>
            <div class="cart">
                <a href="cart.html">Cart <span id="cart-count">0</span></a>
            </div>
        </div>
    </div>

    <!-- Signup Form -->
    <div class="form-container">
        <h1>Create Account</h1>
        <form action="" method="post">
            <div class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstNname" name="firstName" required>
            </div>
            <div class="form-group">
                <label for="surName">Surname:</label>
                <input type="text" id="surName" name="surName" required>
                </div>
            <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>
            </div>
            <div class="form-group">
            <label for="location">Location:</label>
            <select id="location" name="location" required>
                <option value="Nairobi">Nairobi</option>
                <option value="Thika">Thika</option>
                <option value="Kiambu">Kiambu</option>
                <option value="Kiserian">Kiserian</option>
                <option value="Kitengela">Kitengela</option>
                <option value="Nakuru">Nakuru</option>
                <option value="Narok">Narok</option>
            </select>
            </div>
            <div class="form-group">
            <button type="submit" name="submit">Create Account</button>
            </div>
        </form>
        <p>Already have an account? <a href="login.php">Log in</a></p>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-section">
            <h3>Shop by Category</h3>
            <ul>
                <li><a href="#">Vitamins</a></li>
                <li><a href="#">Supplements</a></li>
                <li><a href="#">Specialty drugs</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Contact Us</h3>
            <p>Phone: +254721956970</p>
            <p>Email: info@Tiba.kenya.com</p>
            <p>Location: P.O. Box 1852-00200, Hurlingham, Nairobi, Kenya</p>
        </div>
        <div class="footer-section">
            <h3>Our Top Brands</h3>
            <ul>
                <li>GSK</li>
                <li>Bayer</li>
                <li>Pfizer</li>
                <li>Novartis</li>
                <li>Sanofi</li>
                <li>Merck</li>
                <li>Johnson & Johnson</li>
                <li>Roche</li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Find us on:</h3>
            <div class="social-icons">
                <a href="https://www.facebook.com" target="_blank">Facebook</a>
                <a href="https://www.instagram.com" target="_blank">Instagram</a>
                <a href="https://www.twitter.com" target="_blank">Twitter</a>
                <a href="https://www.linkedin.com" target="_blank">LinkedIn</a>
            </div>
        </div>
    </footer>
</body>
</html>
