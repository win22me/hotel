<?php
// Database connection
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP
$dbname = "hotel_booking"; // Use your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch current offers and news
$sql = "SELECT * FROM offers_and_news WHERE end_date >= CURDATE() ORDER BY start_date ASC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shimla Hotel Offers & News</title>
</head>
<body>
    <h1>Shimla Hotel - Current Offers & News</h1>
    <h1>Shimla Hotel - Offers & News</h1>
    <?php if ($result->num_rows > 0): ?>
        <ul>
            <?php while ($row = $result->fetch_assoc()): ?>
                <li>
                    <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>
                    <p><strong>Valid From:</strong> <?php echo $row['start_date']; ?> <strong>To:</strong> <?php echo $row['end_date']; ?></p>
                </li>
                <hr>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>No current offers or news available.</p>
    <?php endif; ?>

    <?php $conn->close(); ?>
</body>
</html>
