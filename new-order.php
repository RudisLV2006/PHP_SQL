<?php
@require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST['customer'])) {
    $customer = $_REQUEST['customer'];

    // Fetch customer ID based on selected first name
    $sql = "SELECT customer_id FROM customers WHERE first_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $customer);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $id = $row["customer_id"];
        }
    } else {
        echo "No customer found.";
    }
    $stmt->close();

    // Insert a new order
    $sql = "INSERT INTO orders (customer_id, order_date, status) VALUES (?, '1000-1-1', 1)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

?>

<form method="POST">
    <select name="customer">
        <?php
        $sql = "SELECT first_name FROM customers";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<option value=". $row["first_name"]. ">". $row['first_name']. "</option>";
            }
        } else {
            echo "<option>No customers available</option>";
        }
        ?>
    </select>
    <button type="submit">Confirm</button>
</form>

<?php
$conn->close();
?>
