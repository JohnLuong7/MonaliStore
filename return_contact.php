<?php
session_start();
include('server/connection.php');

if (!isset($_SESSION['logged_in'])) {
    echo "You are not logged in.";
    exit();
}

if (isset($_GET['order_id'])) {
    $order_id = intval($_GET['order_id']);

    // Lấy thông tin đơn hàng từ cơ sở dữ liệu
    $stmt = $conn->prepare('SELECT * FROM orders WHERE order_id = ?');
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $order = $stmt->get_result()->fetch_assoc();

    if (!$order) {
        echo "Order not found.";
        exit();
    }
} else {
    echo "No order ID provided.";
    exit();
}
?>

<?php include('layouts/header.php') ?>

<section class="my-5 py-5">
    <div class="container mx-auto">
        <h3 class="text-uppercase mb-4">Contact for Return</h3>
        <p>Please fill out the form below to request a return for your order ID: <strong><?php echo $order_id; ?></strong></p>
        
        <form action="process_return.php" method="POST">
            <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
            <div class="form-group">
                <label for="reason">Reason for Return:</label>
                <textarea class="form-control" id="reason" name="reason" required></textarea>
            </div>
            <div class="form-group">
                <label for="contact_info">Your Contact Information:</label>
                <input type="text" class="form-control" id="contact_info" name="contact_info" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit Return Request</button>
        </form>
    </div>
</section>

<?php include('layouts/footer.php') ?>
