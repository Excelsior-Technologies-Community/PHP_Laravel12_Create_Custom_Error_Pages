# PHP_Laravel12_Create_Custom_Error_Pages 

A beautiful Laravel project demonstrating fully customized **error pages** using **Tailwind CSS**.

This project helps you test and understand how Laravel handles errors like **404, 500, 403, 503, 419, and 429** with clean UI.

---

## Project Features

No database required  
Works with Laravel 10 / 11 / 12  
Tailwind CSS UI  
Custom error pages (404, 500, 403, 503, 419, 429)  
Live testing routes for every error  
Simple and lightweight  

---

# Project Screenshots
<img width="1072" height="780" alt="image" src="https://github.com/user-attachments/assets/4f5b48e4-c263-4e72-ac1a-d019b8d1882f" />
<img width="1760" height="752" alt="image" src="https://github.com/user-attachments/assets/b691c45e-13ba-46e4-a05e-e209c15a7de3" />


##  Installation Guide

```bash
git clone https://github.com/your-username/error-pages-demo.git
cd error-pages-demo

2. Install Dependencies
composer install

3. Create .env File
APP_NAME="Error Pages Demo"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync

4. Generate Application Key
php artisan key:generate

5. Clear Cache
php artisan config:clear
php artisan route:clear
php artisan view:clear

## Run the Project
php artisan serve


Open in browser:

http://127.0.0.1:8000

Test Error Pages
URL	Error Type
/test/404	Page Not Found
/test/500	Server Error
/test/403	Forbidden
/test/503	Maintenance
/test/419	Page Expired
/test/429	Too Many Requests
/admin	Protected Route
/exception	Unhandled Exception
/any-wrong-url	404 Error

## Project Structure

error-pages-demo/
├── .env
├── bootstrap/
│ └── app.php
├── resources/
│ └── views/
│ ├── home.blade.php
│ ├── welcome.blade.php
│ └── errors/
│ ├── 404.blade.php
│ ├── 500.blade.php
│ ├── 403.blade.php
│ ├── 503.blade.php
│ ├── 419.blade.php
│ └── 429.blade.php
├── routes/
│ └── web.php
└── composer.json

Example:

http://127.0.0.1:8000/test/404

Design Info

UI built with Tailwind CSS

Icons from Font Awesome

Responsive cards & buttons

Clean Modern UI
