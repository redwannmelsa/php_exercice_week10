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

// Add a product to the cart
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity']++;
    } else {
        $_SESSION['cart'][$product_id] = ['quantity' => 1, 'product' => $products[$product_id]];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
</head>
<body>
    <h1>Product Listing</h1>

    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php foreach ($products as $product) { ?>
            <tr>
                <td><?= $product['title'] ?></td>
                <td><?= $product['price'] ?></td>
                <td>
                    <form method="POST" action="">
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        <input type="submit" name="add_to_cart" value="Add to Cart">
                    </form>
                </td>
                <td> <a href=<?= "product_details.php?id=" . $product['id'] ?>>details</a> </td>
               
            </tr>
        <?php } ?>
    </table>

    <a href="cart.php">View Cart</a>
</body>
</html>