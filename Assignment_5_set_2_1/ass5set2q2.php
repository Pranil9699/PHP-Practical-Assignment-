<?php
// Initialize database connection parameters
$servername = "localhost";
$username = "root";
$password = "Pranil@2003";
$dbname = "user";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Accept department name from user
$dept_name = $_POST['dept_name'];

// Prepare SQL statement to fetch department info and salary data
$sql = "SELECT d.dname AS dept_name, MAX(e.esalary) AS max_salary, MIN(e.esalary) AS min_salary, SUM(e.esalary) AS sum_salary
        FROM Dept d
        JOIN Emp e ON d.dno = e.dno
        WHERE d.dname = '$dept_name'
        GROUP BY d.dname";

// Execute SQL statement
$result = $conn->query($sql);

// Display result
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Department name: " . $row['dept_name'] . "<br>";
        echo "Maximum Salary: " . $row['max_salary'] . "<br>";
        echo "Minimum Salary: " . $row['min_salary'] . "<br>";
        echo "Sum of the Salary: " . $row['sum_salary'] . "<br>";
    }
} else {
    echo "No data found for the given department.";
}

// Close database connection
$conn->close();
?>
