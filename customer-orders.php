<?php 
@require("connection.php");

$sql = "SELECT c.customer_id, c.first_name, c.last_name, o.order_id FROM customers c LEFT JOIN orders o ON o.customer_id = c.customer_id";
$result = $conn->query($sql);

$array = [];

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    if (isset($array[$row["customer_id"]])) {
    // Append the order ID to the Orders array
    $array[$row["customer_id"]]["Orders"][] = $row["order_id"];
} else {
    // Create a new entry for the customer
    $array[$row["customer_id"]] = [
        "Name" => $row["first_name"],
        "Last Name" => $row["last_name"],
        "Orders" => [
            $row["order_id"]  // Start the Orders array with the first order_id
        ]
    ];
}

    

    // echo "id: " . $row["customer_id"]. " - Name: " . $row["first_name"]. " " . $row["last_name"]. " - Orders:". $row["order_id"] ."<br>";
  }
} else {
  echo "0 results";
}
foreach($array as $item){
    var_dump($item);
    echo "<br>";
}
$conn->close();
?>