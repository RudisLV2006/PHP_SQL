<?php
@require("connection.php");

$sql = "INSERT INTO customers (first_name, last_name, birth_date, address, city, state)
VALUES ('John', 'Doe', '2000-01-01', 'Inzenieru iela 10', 'Ventspils', 'LV')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>