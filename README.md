# PHP_Laravel12_Create_Custom_Error_Pages

A clean and modern Laravel project demonstrating **fully customized error pages** using **Tailwind CSS**.
This repository helps you understand how Laravel handles different HTTP errors with a user-friendly UI.

---

## Project Overview

This project is designed to help developers:

* Understand Laravel error handling
* Create custom error pages with Tailwind CSS
* Test common HTTP error responses
* Learn how Laravel renders error views

The project is lightweight, beginner-friendly, and does not require any database configuration.

---

## Project Features

* No database required
* Works with Laravel 10, 11, and 12
* Tailwind CSS based UI
* Custom error pages for:

  * 404 (Not Found)
  * 500 (Server Error)
  * 403 (Forbidden)
  * 503 (Maintenance)
  * 419 (Page Expired)
  * 429 (Too Many Requests)
* Live testing routes for each error
* Simple and lightweight setup

---

## Project Screenshots

<img width="1072" height="780" alt="404 Error Page" src="https://github.com/user-attachments/assets/4f5b48e4-c263-4e72-ac1a-d019b8d1882f" />

<img width="1760" height="752" alt="Error Pages UI" src="https://github.com/user-attachments/assets/b691c45e-13ba-46e4-a05e-e209c15a7de3" />

---

## Installation Guide

### Step 1: Clone the Repository

```bash
git clone https://github.com/your-username/error-pages-demo.git
cd error-pages-demo
```

### Step 2: Install Dependencies

```bash
composer install
```

### Step 3: Create Environment File

Create a `.env` file with the following basic configuration:

```env
APP_NAME="Error Pages Demo"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync
```

### Step 4: Generate Application Key

```bash
php artisan key:generate
```

### Step 5: Clear Application Cache

```bash
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

---

## Run the Project

```bash
php artisan serve
```

Open your browser and visit:

```
http://127.0.0.1:8000
```

---

## Test Error Pages

Use the following URLs to test different error pages:

| URL            | Error Type          |
| -------------- | ------------------- |
| /test/404      | Page Not Found      |
| /test/500      | Server Error        |
| /test/403      | Forbidden           |
| /test/503      | Maintenance Mode    |
| /test/419      | Page Expired        |
| /test/429      | Too Many Requests   |
| /admin         | Protected Route     |
| /exception     | Unhandled Exception |
| /any-wrong-url | 404 Error           |

Example:

```
http://127.0.0.1:8000/test/404
```

---

## Project Structure

```
error-pages-demo/
├── .env
├── bootstrap/
│   └── app.php
├── resources/
│   └── views/
│       ├── home.blade.php
│       ├── welcome.blade.php
│       └── errors/
│           ├── 404.blade.php
│           ├── 500.blade.php
│           ├── 403.blade.php
│           ├── 503.blade.php
│           ├── 419.blade.php
│           └── 429.blade.php
├── routes/
│   └── web.php
└── composer.json
```

---

## Design Information

* UI built using Tailwind CSS
* Responsive layout
* Clean typography and spacing
* Modern and minimal design

---

## Use Cases

* Learning Laravel error handling
* Customizing default Laravel error pages
* UI practice with Tailwind CSS
* Interview demonstrations

---
