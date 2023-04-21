<?php
$servername = "localhost";
$username = "root";
$password = "Pranil@2003";
$dbname = "user";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get minimum years of experience from user
$min_experience = $_POST['years'];

// Query to fetch agent details with at least the given experience
$sql = "SELECT * FROM agents WHERE agent_experience >= $min_experience";

$result = mysqli_query($conn, $sql);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
  // Display table header
  echo "<table border='1'>";
  echo "<tr><th>Agent Name</th><th>City</th><th>Experience (in years)</th></tr>";

  // Display rows
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["agent_name"] . "</td><td>" . $row["agent_city"] . "</td><td>" . $row["agent_experience"] . "</td></tr>";
  }
  
  // Close table
  echo "</table>";
} else {
  // No results found
  echo "No agents found with at least $min_experience years of experience.";
}

mysqli_close($conn);
?>
