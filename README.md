# Simple Inventory Management System (Laravel)

A clean and simple inventory system built with Laravel, focusing on **Service Class architecture** and **stock-driven workflow**.

This project is designed for learning, interviews, and showcasing clean Laravel practices.

---

## 🔥 Features

- Product creation automatically updates stock
- Order creation with stock availability check
- Stock auto-reduces on order
- Order list & create order on same page
- Stock report with:
  - Product
  - Buy Quantity
  - Sell Quantity
  - Current Stock
  - Stock Value
- Clean separation using **Service classes**

---

## 🏗️ Architecture

- Controllers → Handle HTTP requests
- Services → Handle business logic
- Models → Database interaction
- Views → Blade templates

---

## 🗂️ Modules

- Products
- Stocks
- Orders

---

## 📊 Stock Logic

- Product created → Stock added
- Order created → Stock reduced
- Orders blocked if stock is insufficient

---

## 🧠 Service Classes Used

- `StockService`
- `OrderService`

---

## ⚙️ Installation

```bash
git clone https://github.com/Mushfiqul21/laravel-simple-inventory.git
cd laravel-simple-inventory
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
