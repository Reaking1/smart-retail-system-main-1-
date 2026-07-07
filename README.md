# 🛒 Smart Retail System

*A retail management system developed as a school project using PHP and MySQL.*

---

## 📖 Overview

Smart Retail System is a web-based retail management application developed as part of a school project. The system demonstrates the fundamentals of full-stack web development by providing tools to manage products, customers, and retail operations through a simple and intuitive interface.

The project focuses on CRUD (Create, Read, Update, Delete) operations, database management, and user interaction using PHP and MySQL.

---

## ✨ Features

* 🛍️ Product management
* 📦 Inventory tracking
* 👤 Customer management
* 💰 Sales management
* ➕ Add new products
* ✏️ Edit existing records
* 🗑️ Delete records
* 🔍 Search functionality
* 📊 Database-driven application

---

## 🛠️ Tech Stack

| Technology   | Purpose                       |
| ------------ | ----------------------------- |
| PHP          | Server-side scripting         |
| MySQL        | Database                      |
| HTML5        | Structure                     |
| CSS3         | Styling                       |
| JavaScript   | Client-side functionality     |
| XAMPP / WAMP | Local development environment |

---

## 📁 Project Structure

```text
smart-retail-system/
│
├── css/
├── js/
├── images/
├── includes/
├── database/
│   └── smart_retail.sql
├── index.php
├── login.php
├── dashboard.php
├── products.php
├── customers.php
├── sales.php
├── config.php
├── README.md
└── .gitignore
```

---

## ⚙️ Requirements

Before running the project, install:

* 🟣 PHP 8.x
* 🐬 MySQL
* 🖥️ XAMPP or WAMP
* 💻 Visual Studio Code
* 🌐 Git

---

## 📥 Installation

### 1️⃣ Clone the Repository

```bash
git clone https://github.com/yourusername/smart-retail-system.git
```

### 2️⃣ Move the Project

Copy the project into your web server directory.

**XAMPP**

```text
htdocs/
```

**WAMP**

```text
www/
```

---

### 3️⃣ Create the Database

Open **phpMyAdmin**.

Create a new database.

Example:

```text
smart_retail
```

Import the SQL file located in:

```text
database/smart_retail.sql
```

---

### 4️⃣ Configure the Database

Update your database connection inside `config.php`.

Example:

```php
$host = "localhost";
$user = "root";
$password = "";
$database = "smart_retail";
```

---

## ▶️ Running the Project

Start:

* ✅ Apache
* ✅ MySQL

Open your browser and visit:

```text
http://localhost/smart-retail-system
```

---

## 📊 System Modules

The application includes:

* 🏠 Dashboard
* 📦 Product Management
* 👤 Customer Management
* 💰 Sales Management
* 🗃️ Database Operations

---

## 🎯 Learning Outcomes

This project demonstrates practical experience with:

* 🐘 PHP development
* 🐬 MySQL database design
* 🔄 CRUD operations
* 🗄️ Relational databases
* 🌐 Full-stack web development fundamentals
* 📋 Form handling
* 🔗 Database connectivity

---

## 🚀 Future Improvements

* 🔐 User authentication
* 📈 Sales reports
* 📊 Inventory analytics
* 🧾 Invoice generation
* 📷 Product image uploads
* 🔍 Advanced search and filtering
* 📱 Responsive user interface
* 📦 Stock level notifications

---

## 📄 License

This project was developed for educational purposes as part of a school assignment.

---

## 👨‍💻 Author

Developed by **Kaos**.
