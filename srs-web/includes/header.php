<?php 
include __DIR__ . "/config.php"; 
$cart_count = isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Retail System</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>

<nav class="navbar">
    <a href="<?php echo BASE_URL; ?>index.php">Home</a>
    <a href="<?php echo BASE_URL; ?>products.php">Products</a>
    <a href="<?php echo BASE_URL; ?>cart.php" class="cart-link">
        Cart
        <?php if($cart_count > 0): ?>
            <span class="cart-count"><?php echo $cart_count; ?></span>
        <?php endif; ?>
    </a>
    <a href="<?php echo BASE_URL; ?>admin/login.php">Login</a>
    <a href="<?php echo BASE_URL; ?>register.php">Register</a>
</nav>

</body>
</html>
