<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include __DIR__ . "/config.php"; 

// Cart item count
$cart_count = isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0;

// Detect login state
$is_customer_logged_in = isset($_SESSION['customer_id']);
$customer_name = $is_customer_logged_in ? htmlspecialchars($_SESSION['customer_name']) : '';
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

    <?php if ($is_customer_logged_in): ?>
        <span class="welcome">Hi, <?php echo $customer_name; ?>!</span>
        <a href="<?php echo BASE_URL; ?>logout.php">Logout</a>
    <?php else: ?>
        <a href="<?php echo BASE_URL; ?>loginCustomer.php">Login</a>
        <a href="<?php echo BASE_URL; ?>register.php">Register</a>
    <?php endif; ?>

    <!-- 🛡️ Hidden admin link (emoji only admins know) -->
    <a href="<?php echo BASE_URL; ?>admin/login.php" title="Admin Access" class="admin-link">🛠️</a>
</nav>

