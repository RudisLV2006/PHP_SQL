<?php
@require("connection.php");

$sql = "INSERT INTO orders (customer_id, order_date, status)
VALUES (1011, '2017-01-22', 2)";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>