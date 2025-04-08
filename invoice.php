<?php
session_start();
require_once 'server/connection.php'; // File kết nối cơ sở dữ liệu

// Kiểm tra nếu có order_id trong URL
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Lấy thông tin đơn hàng từ cơ sở dữ liệu
    $order_query = "SELECT * FROM orders WHERE order_id = ?"; // Sử dụng 'order_id'
    $stmt = $conn->prepare($order_query);
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $order_result = $stmt->get_result();

    if ($order_result->num_rows === 0) {
        echo "No order found.";
        exit();
    }

    $order = $order_result->fetch_assoc();

    // Lấy thông tin người dùng (khách hàng)
    $user_query = "SELECT * FROM users WHERE user_id = ?"; // Sử dụng 'user_id'
    $stmt = $conn->prepare($user_query);
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("i", $order['user_id']);
    $stmt->execute();
    $user_result = $stmt->get_result();

    if ($user_result->num_rows === 0) {
        echo "No user found.";
        exit();
    }

    $user = $user_result->fetch_assoc();

    // Lấy chi tiết đơn hàng
    $details_query = "SELECT * FROM order_items WHERE order_id = ?"; // Sử dụng 'order_id'
    $stmt = $conn->prepare($details_query);
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $details_result = $stmt->get_result();
} else {
    echo "No order ID provided.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoá Đơn</title>
    <link rel="stylesheet" href="path/to/your/css/styles.css"> <!-- Thay đổi đường dẫn -->
    <script>
        function printAndRedirect() {
            window.print(); // Lệnh in
        }

        window.addEventListener('afterprint', function() {
            setTimeout(function() {
                window.location.href = 'index.php'; // Chuyển hướng về trang chủ sau khi in
            }, 1000);
        });
    </script>
</head>
<body>
    <div class="container">
        <a href="index.php">
            <img src="./assets/images/logo1.png" alt="Logo">
        </a>

        <h1>HOÁ ĐƠN</h1>
        <p><strong>Tên:</strong> <?php echo $user['user_name']; ?></p>
        <p><strong>Email:</strong> <?php echo $user['user_email']; ?></p>
        <p><strong>Số điện thoại:</strong> <?php echo $order['user_phone']; ?></p>
        <p><strong>Địa Chỉ:</strong> <?php echo $order['user_address']; ?></p>
        <h3>Danh sách sản phẩm</h3>
        <table>
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($item = $details_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $item['product_name']; ?></td>
                        <td><?php echo $item['product_quantity']; ?></td>
                        <td><?php echo number_format($item['product_price'], 2, '.', '.') . ' VND'; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <h3>Total: <?php echo number_format($order['order_cost'], 2, '.', '.') . ' VND'; ?></h3>
        <button onclick="printAndRedirect()">Xuất Hoá Đơn</button>
    </div>
</body>
</html>
<style>
    @media print {
        button {
            display: none;
        }
    }
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }

    .container {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        max-width: 800px;
        margin: auto;
    }

    img {
        width: 100%;
        height: auto; /* Thay đổi thành auto để giữ tỷ lệ */
    }

    h1 {
        color: #333;
        text-align: center;
    }

    h3 {
        color: #555;
    }

    p {
        font-size: 16px;
        line-height: 1.5;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        color: #333;
    }

    tr:hover {
        background-color: #f9f9f9;
    }

    button {
        background-color: #4CAF50; /* Màu xanh lá */
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        margin-top: 20px;
        display: block;
        width: 100%;
    }

    button:hover {
        background-color: #45a049; /* Màu xanh lá đậm khi hover */
    }
</style>

<!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora delectus alias explicabo. Ab velit asperiores necessitatibus fugit numquam sapiente accusamus sit consequatur, nam et illo! Voluptatem harum laborum necessitatibus maxime! -->