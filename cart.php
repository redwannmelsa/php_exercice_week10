<?php
session_start();

$cart = $_SESSION['cart'] ?? [];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Shopping Cart</h1>

    <?php if (empty($cart)) { ?>
        <p>Your cart is empty.</p>
    <?php } else { ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            <?php foreach ($cart as $product_id => $item) { ?>
                <tr>
                    <td><?= $item['product']['title'] ?></td>
                    <td><?= $item['product']['price'] ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td><?= $item['quantity'] * $item['product']['price'] ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="3">Total:</td>
                <td><?= number_format(array_sum(array_map(function($item) {
                      return $item['quantity'] * $item['product']['price'];
                  }, $cart)), 2) ?></td>
            </tr>
        </table>

        <a href="checkout.php">Proceed to Checkout</a>
    <?php } ?>

    <a href="index.php">Back to Products</a>
</body>
</html>