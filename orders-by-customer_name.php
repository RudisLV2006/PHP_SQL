<?php 
@require("connection.php");

$sql = "SELECT * FROM orders WHERE orders.customer_id = (SELECT customer_id FROM customers WHERE first_name = 'Ines')";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["order_id"]. " - Name: " . $row["order_date"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>