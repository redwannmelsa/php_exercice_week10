<?php
session_start();

$products = [
      [
        'title' => 'Produit 0',
        'description' => 'Ceci est la description du produit 0.',
        'image' => 'image1.jpg',
        'price' => 50,
        'id' => 0
    ],
    [
        'title' => 'Produit 1',
        'description' => 'Ceci est la description du produit 1.',
        'image' => 'image1.jpg',
        'price' => 50,
        'id' => 1
    ],
    [
        'title' => 'Produit 2',
        'description' => 'Ceci est la description du produit 2.',
        'image' => 'image2.jpg',
        'price' => 10,
        'id' => 2
    ],
    [
        'title' => 'Produit 3',
        'description' => 'Ceci est la description du produit 3.',
        'image' => 'image3.jpg',
        'price' => 9.99,
        'id' => 3
    ],
    [
        'title' => 'Produit 4',
        'description' => 'Ceci est la description du produit 4.',
        'image' => 'image4.jpg',
        'price' => 110,
        'id' => 4
    ],
    [
        'title' => 'Produit 5',
        'description' => 'Ceci est la description du produit 5.',
        'image' => 'image5.jpg',
        'price' => 20,
        'id' => 5
    ],
    [
        'title' => 'Produit 6',
        'description' => 'Ceci est la description du produit 6.',
        'image' => 'image6.jpg',
        'price' => 3,
        'id' => 6
    ],
    [
        'title' => 'Produit 7',
        'description' => 'Ceci est la description du produit 7.',
        'image' => 'image7.jpg',
        'price' => 900,
        'id' => 7
    ],
    [
        'title' => 'Produit 8',
        'description' => 'Ceci est la description du produit 8.',
        'image' => 'image8.jpg',
        'price' => 11,
        'id' => 8
    ],
    [
        'title' => 'Produit 9',
        'description' => 'Ceci est la description du produit 9.',
        'image' => 'image9.jpg',
        'price' => 19800,
        'id' => 9
    ],
    [
        'title' => 'Produit 10',
        'description' => 'Ceci est la description du produit 10.',
        'image' => 'image10.jpg',
        'price' => 6.50,
        'id' => 10
    ]
];

// Get the product ID from the URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $product = $products[$product_id - 1];
} else {
    die;
}

// Add a product to the cart
if (isset($_POST['add_to_cart'])) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $quantity = isset($_SESSION['cart'][$product_id]) ? $_SESSION['cart'][$product_id]['quantity'] + 1 : 1;
    $_SESSION['cart'][$product_id] = ['quantity' => $quantity, 'product' => $product];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
</head>
<body>
    <h1>Product Details</h1>
    <h2><?= $product['title'] ?></h2>
    <p><?= $product['description'] ?></p>
    <p>Price: $<?= $product['price'] ?></p>

    <form method="POST" action="">
        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
        <input type="submit" name="add_to_cart" value="Add to Cart">
    </form>

    <a href="index.php">Back to Products</a>
</body>
</html>