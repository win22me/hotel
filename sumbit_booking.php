<?php
// Database connection
$host = 'localhost';
$db = 'hotel_database';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $bookings);

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
