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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $sql = "INSERT INTO offers_and_news (title, description, start_date, end_date) 
            VALUES ('$title', '$description', '$start_date', '$end_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Offer/News added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Offers & News</title>
</head>
<body>
    <h1>Add Offers & News</h1>
    <form method="POST" action="">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required><br><br>

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" required><br><br>

        <button type="submit">Add Offer/News</button>
    </form>
</body>
</html>
