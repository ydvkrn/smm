<?php
include 'db.php';
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $order_id = $_GET['order_id'];

    if (!$order_id) {
        echo json_encode(["status" => "error", "message" => "Order ID required"]);
        exit;
    }

    $query = "SELECT * FROM orders WHERE id = '$order_id'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        echo json_encode(["status" => "success", "order" => $row]);
    } else {
        echo json_encode(["status" => "error", "message" => "Order not found"]);
    }
}
?>
