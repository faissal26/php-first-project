<?php
// products.php

// Sample data for medicine categories and products
$categories = [
    'Pain Relief' => [
        ['name' => 'Aspirin', 'price' => 12.99],
        ['name' => 'Ibuprofen', 'price' => 9.99],
    ],
    'Cold and Flu' => [
        ['name' => 'DayQuil', 'price' => 14.99],
        ['name' => 'NyQuil', 'price' => 13.99],
    ],
    'Allergy' => [
        ['name' => 'Zyrtec', 'price' => 19.99],
        ['name' => 'Claritin', 'price' => 17.99],
    ],
];

// Mock search filters
$searchFilters = ['category' => '', 'search' => ''];

// Function to display product cards
function displayProducts($products) {
    foreach ($products as $product) {
        echo '<div class="product-card">';
        echo '<h3>' . $product['name'] . '</h3>';
        echo '<p>Price: $' . number_format($product['price'], 2) . '</p>';
        echo '</div>';
    }
}

// Logic for filtering products
$filteredProducts = [];
if (!empty($searchFilters['category'])) {
    $filteredProducts = $categories[$searchFilters['category']] ?? [];
} else {
    foreach ($categories as $productGroup) {
        $filteredProducts = array_merge($filteredProducts, $productGroup);
    }
}

// HTML structure
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Products</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Pharmacy Products</h1>
    <div class="search-filters">
        <select name="category">
            <option value="">All Categories</option>
            <?php foreach (array_keys($categories) as $category): ?>
                <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="search" placeholder="Search Products" />
        <button type="submit">Search</button>
    </div>
    <div class="product-list">
        <?php displayProducts($filteredProducts); ?>
    </div>
</body>
</html>