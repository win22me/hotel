<?php

<header>
        <div class="container">
            <h1>Welcome to Shimla Hotel</h1>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="facilities.html" class="active">Facilities</a></li>
                    <li><a href="rooms.html">Rooms</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

// Database connection
$host = 'localhost';
$db = 'booking';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$room = $_POST['room'];
$guests = $_POST['guests'];
$message = $_POST['message'];

// Insert into database
$sql = "INSERT INTO bookings (name, email, phone, checkin_date, checkout_date, room_type, guests, special_requests)
        VALUES ('$name', '$email', '$phone', '$checkin', '$checkout', '$room', '$guests', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Booking successful! We will contact you soon.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
