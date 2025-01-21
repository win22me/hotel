<?php
// Database connection
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP
$dbname = "hotel_booking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$checkin_date = $_POST['checkin_date'];
$checkout_date = $_POST['checkout_date'];
$room_type = $_POST['room_type'];
$guests = $_POST['guests'];
$special_requests = $_POST['special_requests'];

// Insert data into database
$sql = "INSERT INTO booking (name, email, phone, checkin_date, checkout_date, room_type, guests, special_requests) 
        VALUES ('$name', '$email', '$phone', '$checkin_date', '$checkout_date', '$room_type', $guests, '$special_requests')";

if ($conn->query($sql) === TRUE) {
    echo "Booking successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
