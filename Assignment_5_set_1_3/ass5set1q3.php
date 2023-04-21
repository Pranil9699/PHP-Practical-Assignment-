<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "Pranil@2003";
$dbname = "user";

// Accept department name from user
$dept_name = $_POST['dept_name'];

// Create database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Build SQL query to count employees in department
$sql = "SELECT COUNT(*) as count FROM Emp e JOIN Dept d ON e.dno = d.dno WHERE d.dname = '$dept_name'";

// Execute query and fetch result
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

// Output result
echo "There are " . $data['count'] . " employees working in the $dept_name department.";

// Close database connection
mysqli_close($conn);
?>
