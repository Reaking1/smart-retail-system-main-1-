<?php
session_start();
include __DIR__ . "/../includes/db.php";
include __DIR__ . "/../includes/header.php";

// Initialize cart
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
<div class="container">
    <h1>Your Shopping Cart</h1>

    <?php if (empty($_SESSION['cart'])): ?>
        <p>Your cart is empty. <a href="products.php">Go shopping</a></p>
    <?php else: ?>
        <table border="1" cellpadding="10" cellspacing="0" width="100%" id="cart-table">
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            <?php
            $total = 0;
            foreach ($_SESSION['cart'] as $id => $qty):
                $result = $conn->query("SELECT * FROM products WHERE product_id = $id");
                if ($result && $row = $result->fetch_assoc()):
                    $sub_total = $row['price'] * $qty;
                    $total += $sub_total;
            ?>
            <tr data-id="<?php echo $id; ?>">
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td>R <?php echo $row['price']; ?></td>
                <td>
                    <input type="number" value="<?php echo $qty; ?>" min="1" class="qty-input">
                </td>
                <td class="sub-total">R <?php echo $sub_total; ?></td>
                <td><button class="remove-btn">Remove</button></td>
            </tr>
            <?php
                endif;
            endforeach;
            ?>
            <tr>
                <td colspan="3"><strong>Grand Total</strong></td>
                <td colspan="2" id="grand-total">R <?php echo $total; ?></td>
            </tr>
        </table>
        <br>
        <a href="checkout.php"><button>Proceed to Checkout</button></a>
    <?php endif; ?>
</div>

<script>
     const BASE_URL = "<?php echo BASE_URL ?? ''; ?>";
</script>
<script src="../assets/JS/cart.js"></script>

<?php include __DIR__ . "/../includes/footer.php"; ?>
</body>
</html>
