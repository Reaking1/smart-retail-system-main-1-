CREATE DATABASE IF NOT EXISTS smart_retail;
USE smart_retail;

-- ===========================
-- 🧑 Customers Table
-- ===========================
CREATE TABLE customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ===========================
-- 🏪 Products Table
-- ===========================
CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    stock_quantity INT DEFAULT 0,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ===========================
-- 🧾 Orders Table
-- ===========================
CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    total_amount DECIMAL(10,2) NOT NULL,
    status ENUM('Pending','Shipped','Completed','Cancelled') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id) ON DELETE CASCADE
);

-- ===========================
-- 📦 Order Items Table
-- ===========================
CREATE TABLE order_items (
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);

-- ===========================
-- 💳 Payments Table
-- ===========================
CREATE TABLE payments (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    status ENUM('Pending','Paid','Failed') DEFAULT 'Pending',
    transaction_ref VARCHAR(100),
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE
);

-- ===========================
-- 🔐 Admin Table
-- ===========================
CREATE TABLE admin_users (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    full_name VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ===========================
-- 🌱 Default Admin Account
-- ===========================
INSERT INTO admin_users (username, password, email, full_name)
VALUES (
    'meisYou',
    '$2y$10$WUKlAGm79JS.7sBwlCxP4u3gJ7iMDqdObFxNZonVZkB1KTKuiUdua',
    'meisyou@example.com',
    'Meis You'
);

-- ===========================
-- 🧃 Sample Products
-- ===========================
INSERT INTO products (name, description, price, stock_quantity, image_url)
VALUES
('Wireless Mouse', 'Smooth and fast wireless mouse', 199.99, 25, 'assets/images/products/mouse.jpg'),
('Mechanical Keyboard', 'RGB backlit mechanical keyboard', 799.99, 15, 'assets/images/products/keyboard.jpg'),
('Laptop Backpack', 'Water-resistant travel bag', 349.50, 30, 'assets/images/products/bag.jpg'),
('Gaming Headset', 'High-quality sound and mic', 499.00, 20, 'assets/images/products/headset.jpg'),
('USB-C Charger', 'Fast-charging power adapter', 249.00, 40, 'assets/images/products/charger.jpg');
