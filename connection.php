 <?php
$servername = "localhost";
$username = "PHP09.05.2025";
$password = "password";
$dbname = "sql_store";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully". "<br>";
?> 