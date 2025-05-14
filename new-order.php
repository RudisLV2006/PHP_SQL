<?php
@require("connection.php");

// SQL query to fetch customer details
$sql = "SELECT customer_id, first_name FROM customers";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['customer'])) {
    $customer_id = $_POST['customer'];

    // Validate customer ID (should be numeric)
    if (is_numeric($customer_id)) {
        // Insert a new order for the selected customer
        $sql_insert = "INSERT INTO orders (customer_id, order_date, status) VALUES (?, '1000-1-1', 1)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bind_param("i", $customer_id);  // Binding the customer_id as an integer

        if ($stmt->execute()) {
            // After successful order creation, redirect to avoid resubmitting the form
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Invalid customer ID.";
    }
}

?>

<!-- Form to select customer -->
<form method="POST">
    <select name="customer">
        <?php
        // Fetch the customer options from the database
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // Output data for each customer
            while ($row = $result->fetch_assoc()) {
                echo "<option value=" . $row["customer_id"] . ">" . $row['first_name'] . "</option>";
            }
        } else {
            echo "<option>No customers available</option>";
        }
        ?>
    </select>
    <button type="submit">Confirm</button>
</form>

<?php
// Close the database connection
$conn->close();
?>
