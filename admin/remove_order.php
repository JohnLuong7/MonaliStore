<?php
session_start();
include('../server/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];

    // Prepare and execute the delete statement
    $stmt = $conn->prepare('DELETE FROM orders WHERE order_id = ?');
    $stmt->bind_param('i', $order_id);
    $stmt->execute();

    // Check if the deletion was successful
    if ($stmt->affected_rows > 0) {
        header("Location: list_orders.php?message=Order has been deleted successfully.");
    } else {
        header("Location: list_orders.php?message=Failed to delete the order or order not found.");
    }
    exit;
}
?>
