<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'booking');
<h1> List of customer </h1>
// Fetch bookings
$result = $conn->query("SELECT * FROM bookings ORDER BY created_at DESC");

echo "<h1>Booking List</h1>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Check-In</th><th>Check-Out</th><th>Room Type</th><th>Guests</th><th>Special Requests</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['email']}</td>
        <td>{$row['phone']}</td>
        <td>{$row['checkin_date']}</td>
        <td>{$row['checkout_date']}</td>
        <td>{$row['room_type']}</td>
        <td>{$row['guests']}</td>
        <td>{$row['special_requests']}</td>
    </tr>";
}

echo "</table>";
$conn->close();
?>
