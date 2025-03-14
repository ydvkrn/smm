<?php
include 'db.php';
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $service = $_POST['service'];
    $link = $_POST['link'];
    $quantity = $_POST['quantity'];

    if (!$service || !$link || !$quantity) {
        echo json_encode(["status" => "error", "message" => "All fields are required"]);
        exit;
    }

    $query = "INSERT INTO orders (service, link, quantity) VALUES ('$service', '$link', '$quantity')";
    if (mysqli_query($conn, $query)) {
        echo json_encode(["status" => "success", "message" => "Order placed successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to place order"]);
    }
}
?>
