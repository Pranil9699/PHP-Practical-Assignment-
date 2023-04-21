<?php

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "Pranil@2003";
$dbname = "user";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Accept details of new agent from user
$name = $_POST['name'];
$city = $_POST['city'];
$experience = $_POST['experience'];

// Prepare and execute query to insert new agent record into database
$sql = "INSERT INTO agents (agent_name, agent_city, agent_experience) VALUES ('$name', '$city', $experience)";


if (mysqli_query($conn, $sql)) {
    echo "New agent record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

?>
