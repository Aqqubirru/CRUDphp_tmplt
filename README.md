<h1 align="center">📘 Simple PHP CRUD with MySQL</h1>
<h3 align="center">Basic Create, Read, Update, Delete App using PHP & MySQL</h3>

<p align="center">
  <img src="https://img.shields.io/badge/Language-PHP-blue" />
  <img src="https://img.shields.io/badge/Database-MySQL-orange" />
  <img src="https://img.shields.io/badge/Status-Completed-brightgreen" />
</p>

---

## 📋 Overview

This is a simple **CRUD (Create, Read, Update, Delete)** application built with **PHP and MySQL**.  
It serves as a basic example of how to interact with a MySQL database using PHP procedural or object-oriented style.

---

## ✨ Features

- ✅ Add new data
- 📝 Edit existing data
- 🔍 View all data
- ❌ Delete data
- 💾 MySQL integration with form handling

---

## 🧠 Technologies Used

- **PHP**
- **MySQL / phpMyAdmin**
- **HTML/CSS**
- (Optional: Bootstrap for styling)

---

## ⚙️ Setup Instructions

1. Clone or download this repository
2. Import `database.sql` (if available) into your MySQL server
3. Configure your database connection in `config.php`:

###💬 Author
✍️ Aqbil (Aqqubirru)
📧 Email: aqbilhasyarasyadi21@gmail.com
📱 Instagram: @jbiel.hr
🎵 TikTok: @aqqubirru

```php
<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "your_database_name";

$conn = new mysqli($host, $user, $password, $database);
?>

