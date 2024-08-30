<?php
$servername = "localhost"; // Change this to your server address if necessary
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "TibaPharmacyStore"; // The name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $user_name = $_POST['name'];
    $email = $_POST['mail'];
    $medicine_name = $_POST['medname'];
    $phone = $_POST['phoneOrder'];
    $location = $_POST['locationOrder'];
    $quantity = $_POST['quantityOrder'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO Orders (name, mail, medname, phoneOrder, locationOrder, quantityOrder) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $user_name, $email, $medicine_name, $phone, $location, $quantity);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Order submitted successfully!";
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
    <title>Medicines - Tiba Pharmacy Store</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
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
            <a href="catalog.php">View Catalog</a> <!-- Added link to new catalog page -->

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

    <!-- Medicines Section -->
    <section id="medicines">
        <div class="available-medicine">
        <h2>Available Medicines</h2>
        </div>
        <div class="medicine-item">
            <img src=".\images\Aspirin.jpg" alt="Solvent">
            <h3>Aspirin</h3>
            <button class="add-to-cart">Add to Cart</button>
            <button class="view-image">View Image</button>
            <button onclick="orderMedicine('Aspirin')">Order Now</button>
        </div>
        <div class="medicine-item">
            <img src=".\images\Atorvastatin.jpg" alt="Capsules"><!-- Place your image here -->
            <h3>Artovastatin</h3>
            <button class="add-to-cart">Add to Cart</button>
            <button class="view-image">View Image</button>
            <button onclick="orderMedicine('Artovastatin')">Order Now</button>
        </div>
        <div class="medicine-item">
            <img src=".\images\Levothyroxine.jpg" alt="Tablets"><!-- Place your image here -->
            <h3>Levothyroxine</h3>
            <button class="add-to-cart">Add to Cart</button>
            <button class="view-image">View Image</button>
            <button onclick="orderMedicine('Levothyroxine')">Order Now</button>
        </div>
        <div class="medicine-item">
            <img src=".\images\lisinispiril.jpg" alt="Medicine 4"><!-- Place your image here -->
            <h3>Lisinispiril</h3>
            <button class="add-to-cart">Add to Cart</button>
            <button class="view-image">View Image</button>
            <button onclick="orderMedicine('Lisinispiril')">Order Now</button>
        </div>
        <div class="medicine-item">
            <img src=".\images\Metformin.jpg" alt="Medicine 5"><!-- Place your image here -->
            <h3>Metaformin</h3>
            <button class="add-to-cart">Add to Cart</button>
            <button class="view-image">View Image</button>
            <button onclick="orderMedicine('Metaformin')">Order Now</button>
        </div>
        <div class="medicine-item">
            <img src=".\images\Metoprolol.jpg" alt="Tablets"><!-- Place your image here -->
            <h3>Metropolol</h3>
            <button class="add-to-cart">Add to Cart</button>
            <button class="view-image">View Image</button>
            <button onclick="orderMedicine('Metropolol')">Order Now</button>
        </div>
        <div class="medicine-item">
            <img src=".\images\Omeprazole.jpg" alt="Tablets"><!-- Place your image here -->
            <h3>Omeprazole</h3>
            <button class="add-to-cart">Add to Cart</button>
            <button class="view-image">View Image</button>
            <button onclick="orderMedicine('Omeprazole')">Order Now</button>
        </div>
        <div class="medicine-item">
            <img src=".\images\Losartan.jpg" alt="Capsules"><!-- Place your image here -->
            <h3>Losartan</h3>
            <button class="add-to-cart">Add to Cart</button>
            <button class="view-image">View Image</button>
            <button onclick="orderMedicine('Losartan')">Order Now</button>
        </div>        
        <div class="medicine-item">
            <img src=".\images\Gabapentin.jpg" alt="Tablets"><!-- Place your image here -->
            <h3>Gabapentin</h3>
            <button class="add-to-cart">Add to Cart</button>
            <button class="view-image">View Image</button>
            <button onclick="orderMedicine('Gabapentin')">Order Now</button>
        </div>    
        <div class="medicine-item">
            <img src=".\images\Atorvastatin.jpg" alt="Capsules"><!-- Place your image here -->
            <h3>Artovastatin</h3>
            <button class="add-to-cart">Add to Cart</button>
            <button class="view-image">View Image</button>
            <button onclick="orderMedicine('Artovastatin')">Order Now</button>
        </div>        
        <div class="medicine-item">
            <img src=".\images\Amoxicilin.jpg" alt="Capsules"><!-- Place your image here -->
            <h3>Amoxicilin</h3>
            <button class="add-to-cart">Add to Cart</button>
            <button class="view-image">View Image</button>
            <button onclick="orderMedicine('Amoxicilin')">Order Now</button>
        </div>
        <div class="medicine-item">
            <img src=".\images\Keytruda.jpg" alt="Injection"><!-- Place your image here -->
            <h3>Keytruda</h3>
            <button class="add-to-cart">Add to Cart</button>
            <button class="view-image">View Image</button>
            <button onclick="orderMedicine('Keytruda')">Order Now</button>
        </div>
        <div class="medicine-item">
            <img src=".\images\Eliquis.jpg" alt="Medicine 2"><!-- Place your image here -->
            <h3>Eliquis</h3>
            <button class="add-to-cart">Add to Cart</button>
            <button class="view-image">View Image</button>
            <button onclick="orderMedicine('Eliquis')">Order Now</button>
        </div>
        <div class="medicine-item">
            <img src=".\images\Revlimid.jpg" alt="Medicine 2"><!-- Place your image here -->
            <h3>Revlimid</h3>
            <button class="add-to-cart">Add to Cart</button>
            <button class="view-image">View Image</button>
            <button onclick="orderMedicine('Revlimid')">Order Now</button>
        </div>
        <div class="medicine-item">
            <img src=".\images\Opdivo.jpg" alt="Medicine 2"><!-- Place your image here -->
            <h3>Opdivo</h3>
            <button class="add-to-cart">Add to Cart</button>
            <button class="view-image">View Image</button>
            <button onclick="orderMedicine('Opdivo')">Order Now</button>
        </div>
        <div class="medicine-item">
            <img src=".\images\Imbruvica.jpg" alt="Medicine 2"><!-- Place your image here -->
            <h3>Imbruvica</h3>
            <button class="add-to-cart">Add to Cart</button>
            <button class="view-image">View Image</button>
            <button onclick="orderMedicine('Imbruvica')">Order Now</button>
        </div>
        <div class="medicine-item">
            <img src=".\images\Humira.jpg"alt="Medicine 2"><!-- Place your image here -->
            <h3>Humira</h3>
            <button class="add-to-cart">Add to Cart</button>
            <button class="view-image">View Image</button>
            <button onclick="orderMedicine('Humira')">Order Now</button>
        </div>
        <div class="medicine-item">
            <img src=".\images\Biktarvy.jpg" alt="Medicine 2"><!-- Place your image here -->
            <h3>Biktarvy</h3>
            <button class="add-to-cart">Add to Cart</button>
            <button class="view-image">View Image</button>
            <button onclick="orderMedicine('Biktarvy')">Order Now</button>
        </div>
        <div class="medicine-item">
            <img src=".\images\Stelara.jpg" alt="Medicine 2"><!-- Place your image here -->
            <h3>Stelara</h3>
            <button class="add-to-cart">Add to Cart</button>
            <button class="view-image">View Image</button>
            <button onclick="orderMedicine('Stelara')">Order Now</button>
        </div>
        <div class="medicine-item">
            <img src=".\images\Trulicity.jpg" alt="Medicine 2"><!-- Place your image here -->
            <h3>Trulicity</h3>
            <button class="add-to-cart">Add to Cart</button>
            <button class="view-image">View Image</button>
            <button onclick="orderMedicine('Trulicity')">Order Now</button>
        </div>
        <div class="medicine-item">
            <img src=".\images\Hemgenix.jpg" alt="Medicine 2"><!-- Place your image here -->
            <h3>Hemgenix</h3>
            <button class="add-to-cart">Add to Cart</button>
            <button class="view-image">View Image</button>
            <button onclick="orderMedicine('Hemgenix')">Order Now</button>
        </div>
        <div class="medicine-item">
            <img src=".\images\Comirnaty.jpg" alt="Medicine 2"><!-- Place your image here -->
            <h3>Comirnaty</h3>
            <button class="add-to-cart">Add to Cart</button>
            <button class="view-image">View Image</button>
            <button onclick="orderMedicine('Comirnaty')">Order Now</button>
        </div>
        <div class="medicine-item">
            <img src=".\images\Meloxicam.jpg" alt="Medicine 2"><!-- Place your image here -->
            <h3>Meloxicam</h3>
            <button class="add-to-cart">Add to Cart</button>
            <button class="view-image">View Image</button>
            <button onclick="orderMedicine('Meloxicam')">Order Now</button>
        </div>
        <div class="medicine-item">
            <img src=".\images\Tamsulosin.jpg" alt="Medicine 2"><!-- Place your image here -->
            <h3>Tamsulosin</h3>
            <button class="add-to-cart">Add to Cart</button>
            <button class="view-image">View Image</button>
            <button onclick="orderMedicine('Tamsulosin')">Order Now</button>
        </div>
        <!-- Add more medicines as needed -->
    </section>

    <div class="upload-prescription">
        <h2>Upload Your Prescription</h2>
        <div class="prescription-upload">
        <form id="prescription-form" enctype="multipart/form-data" action="" method="POST">
            <input type="file" id="prescription" name="prescription" accept="image/*,application/pdf" required>
            <button type="submit">Upload</button>
        </form>
        </div>
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

    <!-- Image Modal -->
    <div id="imageModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <img id="modalImage" src="" alt="Medicine Image">
            <p id="modalDescription"></p>
        </div>
    </div>

    <!-- Order Modal -->
    <div id="orderModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Order Details</h2>
            <form action="#" method="post">
                <div class="order-form"><label for="orderName">Name:</label>
                </div>
                <div class="order-form"><label for="orderEmail">Email:</label>
                <input type="email" id="orderEmail" name="mail" required>
                </div>
                <div class="order-form"><label for="orderMed">Medicine Name:</label>
                    <input type="orderMed" id="orderMed" name="medname" required>
                    </div>
                <div class="order-form"><label for="orderPhone">Phone:</label>
                <input type="text" id="orderPhone" name="phoneOrder" required>
                </div>
                <div class="order-form"><label for="orderLocation">Location:</label>
                <select id="orderLocation" name="locationOrder">
                    <option value="Nairobi">Nairobi</option>
                    <option value="Thika">Thika</option>
                    <option value="Kiambu">Kiambu</option>
                    <option value="Kiserian">Kiserian</option>
                    <option value="Kitengela">Kitengela</option>
                    <option value="Nakuru">Nakuru</option>
                    <option value="Narok">Narok</option>

                </select>
            </div>
            <div class="order-form"><label for="orderQuantity">Quantity:</label>
            <input type="number" id="orderQuantity" name="quantityOrder" required>
            </div>
            <div class="order-form"><button onclick="submitOrder()">Submit Order</button></div>

            </form>
        </div>
    </div>

   <!-- Scripts -->
   <script>
    function viewImage(title, src, description) {
        document.getElementById('modalImage').src = src;
        document.getElementById('modalDescription').innerText = description;
        document.getElementById('imageModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('imageModal').style.display = 'none';
        document.getElementById('orderModal').style.display = 'none';
    }

    function orderMedicine(medicineName) {
        document.getElementById('orderModal').style.display = 'block';
    }

    function submitOrder() {
        alert("Your order will be arriving soon");
        closeModal();
    }
    function search() {
        let filter = document.getElementById('search').value.toUppercase();

        let item = document.querySelectorAll('.medicine-item');

        let l = document.getElementsByTagName('h3');

        for(var i = 0;i<=l.length;i++){
            let a=item[i].getElementsByTagName('h3')[0];

            let value=a.innerHTML || a.innerText || a.textContent;

            if(value.toUpperCase().indexOf(filter) > -1) {
                item[i].style.display="";
            }
            else
            {
                item[i].style.display="none";
            }

        }
    }
</script>


</body>
</html>
