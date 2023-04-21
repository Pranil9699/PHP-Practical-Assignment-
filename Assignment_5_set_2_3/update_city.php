<?php
// Initialize database connection
$servername = "localhost";
$username = "root";
$password = "Pranil@2003";
$dbname = "user";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for database connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the experience value entered by the user
    $experience = $_POST["experience"];

    // Update city to Mumbai for doctors with less than entered experience
    $sql = "UPDATE doctor SET city='Mumbai' WHERE experience < $experience";
    if ($conn->query($sql) === TRUE) {
        echo "City updated successfully<br>";
    } else {
        echo "Error updating city: " . $conn->error . "<br>";
    }
}

// Display all doctors after updating their city to Mumbai
$sql = "SELECT * FROM doctor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Doctor No</th><th>Doctor Name</th><th>Experience</th><th>City</th><th>Area</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["doc_no"] . "</td><td>" . $row["doc_name"] . "</td><td>" . $row["experience"] . "</td><td>" . $row["city"] . "</td><td>" . $row["area"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No doctors found";
}

$conn->close();
?>
