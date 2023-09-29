<?php
session_start();

if (empty($_SESSION['cart'])) {
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout</h1>

    <form method="POST" action="confirmation.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea><br>

        <input type="submit" name="place_order" value="Place Order">
    </form>

    <a href="cart.php">Back to Cart</a>
</body>
</html>