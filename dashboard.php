<?php
// dashboard.php

// Pharmacy Management Dashboard

// Sample Data
$inventory = [
    'Medicine A' => ['quantity' => 50, 'price' => 10],
    'Medicine B' => ['quantity' => 20, 'price' => 15],
    'Medicine C' => ['quantity' => 0, 'price' => 8],
];

$sales = [
    ['date' => '2026-02-01', 'amount' => 200],
    ['date' => '2026-02-02', 'amount' => 150],
    ['date' => '2026-02-03', 'amount' => 300],
];

$recentOrders = [
    ['id' => 1, 'medicine' => 'Medicine A', 'quantity' => 2, 'status' => 'Delivered'],
    ['id' => 2, 'medicine' => 'Medicine B', 'quantity' => 1, 'status' => 'Pending'],
];

function displayInventory($inventory) {
    echo "<h2>Inventory Overview</h2>";
    foreach ($inventory as $med => $data) {
        $status = $data['quantity'] == 0 ? "Out of Stock" : "In Stock";
        echo "<p>{$med}: {$data['quantity']} units available at \\$ {$data['price']}</p><p>Status: {$status}</p>";
    }
}

displayInventory($inventory);

echo "<h2>Sales Metrics</h2>";
$totalSales = array_sum(array_column($sales, 'amount'));
echo "<p>Total Sales: \\$ {$totalSales}</p>";

echo "<h2>Recent Orders</h2>";
foreach ($recentOrders as $order) {
    echo "<p>Order ID: {$order['id']}, Medicine: {$order['medicine']}, Quantity: {$order['quantity']}, Status: {$order['status']}</p>";
}

// Check for Stock Alerts
echo "<h2>Stock Alerts</h2>";
foreach ($inventory as $med => $data) {
    if ($data['quantity'] == 0) {
        echo "<p>Alert: {$med} is out of stock!</p>";
    }
}
?>