<?php
session_start();

$cart = $_SESSION['cart'];
$customer_name = $_POST['name'];
$customer_address = $_POST['address'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_order'])) {
    unset($_SESSION['cart']);
    header("Location: thank_you.php");
    exit;
} else if (empty($_SESSION['cart']) || empty($_POST['name']) || empty($_POST['address'])) {
    header("Location: index.php"); // Redirect to the product listing page or an error page
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
</head>
<body>
    <h1>Order Confirmation</h1>

    <h2>Order Summary</h2>
    <ul>
        <?php foreach ($cart as $product_id => $item) { ?>
            <li><?= $item['product']['title'] ?> (Quantity: <?= $item['quantity'] ?>)</li>
        <?php } ?>
    </ul>

    <h2>Customer Information</h2>
    <p>Name: <?= $customer_name ?></p>
    <p>Address: <?= $customer_address ?></p>

    <form method="POST" action="">
        <input type="submit" name="confirm_order" value="Confirm">
    </form>

    <a href="index.php">Back to Products</a>
</body>
</html>