<?php
session_start();
include('server/connection.php');

if (!isset($_SESSION['logged_in'])) {
    echo "You are not logged in.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id']) && isset($_POST['reason']) && isset($_POST['contact_info'])) {
    $order_id = intval($_POST['order_id']);
    $reason = htmlspecialchars($_POST['reason']);
    $contact_info = htmlspecialchars($_POST['contact_info']);

    // Chuẩn bị câu lệnh SQL
    $stmt = $conn->prepare('INSERT INTO return_requests (order_id, reason, contact_info) VALUES (?, ?, ?)');
    
    // Kiểm tra xem câu lệnh có chuẩn bị thành công không
    if ($stmt === false) {
        die('MySQL prepare error: ' . $conn->error);
    }

    // Ràng buộc tham số
    $stmt->bind_param('iss', $order_id, $reason, $contact_info);

    // Thực thi câu lệnh
    if ($stmt->execute()) {
        // Chuyển hướng đến trang "Answer_Submit_Return.php"
        header("Location: Answer_Submit_Return.php");
        exit();
    } else {
        echo "Failed to submit return request: " . $stmt->error;
    }

    // Đóng câu lệnh
    $stmt->close();
} else {
    echo "Invalid request.";
}
?>
