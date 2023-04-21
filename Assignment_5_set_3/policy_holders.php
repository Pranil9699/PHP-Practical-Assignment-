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

// Get agent name from user
$agent_name = $_POST['agent_name'];

// Query to fetch policy holders for the given agent name
$sql = "SELECT * FROM policies INNER JOIN agents ON policies.agent_id = agents.agent_id WHERE agents.agent_name = '$agent_name'";

$result = mysqli_query($conn, $sql);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
  // Display table header
  echo "<table border='1'>";
  echo "<tr><th>Policy Holder Name</th><th>Policy Type</th><th>Policy Amount</th><th>Policy Start Date</th><th>Policy End Date</th></tr>";

  // Display rows
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["policy_holder_name"] . "</td><td>" . $row["policy_type"] . "</td><td>" . $row["policy_amount"] . "</td><td>" . $row["policy_start_date"] . "</td><td>" . $row["policy_end_date"] . "</td></tr>";
  }
  
  // Close table
  echo "</table>";
} else {
  // No results found
  echo "No policies found for agent $agent_name.";
}

mysqli_close($conn);
?>
