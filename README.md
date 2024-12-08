<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

# Book Collection

## Video Demo
[![Vidoe Demo](https://img.youtube.com/vi/TfAG4LOBhA8/0.jpg)](https://www.youtube.com/watch?v=TfAG4LOBhA8)

This is a Laravel & Inertia.js-based Book Collection application. It allows users to manage a collection of books, including functionalities to filter, view, create, edit, and delete books. The frontend is built using Vue.js and styled with Tailwind CSS.

## Features

- **CRUD Operations**: Create, Read, Update, and Soft Delete books.
- **Filter Books**: Filter by status (available, borrowed, reserved) and published year.
- **Pagination**: Paginated list of books with dynamic per-page item selection.
- **Responsive Design**: Clean, mobile-first UI built with Tailwind CSS.
  
## Requirements

Before you begin, ensure you have the following installed:

- PHP (>= 8.1)
- Composer
- Node.js & NPM
- Laravel (>= 9.x)
- MySQL or any other database supported by Laravel

## Setup Instructions

Follow the steps below to get your environment up and running.

### 1. Clone the Repository

```bash
git clone https://github.com/udofia2/bibliotheca.git
cd bibliotheca
```

### 2. Install Backend Dependencies

Install PHP dependencies using Composer:

```bash
composer install
```

### 3. Set up Environment Variables

Copy the `.env.example` file to `.env`:

```bash
cp .env.example .env
```

Edit the `.env` file to configure your database and other environment settings:

```plaintext
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bibliotheca
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key

Run the following command to generate the application key:

```bash
php artisan key:generate
```

### 5. Run Migrations

Run the migrations to create the necessary database tables:

```bash
php artisan migrate
```

### 6. Seed the Database

If you'd like to populate the database with sample data, you can run:

```bash
php artisan db:seed
```

### 7. Install Frontend Dependencies

Install the frontend dependencies using NPM:

```bash
npm install
```

### 8. Build the Assets

Build the frontend assets:

```bash
npm run dev
```

### 9. Run the Application

Start the Laravel development server:

```bash
php artisan serve
```

Now, you can access the application by visiting `http://127.0.0.1:8000` in your browser.

___
## Usage

### Pages

1. **Books Index**: Displays a paginated list of books with filtering options (by status and year).
2. **Book Show**: Displays the details of a single book.
3. **Create Book**: A form to add a new book to the collection.
4. **Edit Book**: A form to edit an existing book's details.

### Filtering

You can filter the books by:

- **Status**: Choose from available, borrowed, or reserved.
- **Year**: Enter a specific year to filter books by their published year.

### Pagination

The list of books is paginated. By difault the items per page is 3 but you can adjust with a query param ?page=1&perPage=2 (Example: http://localhost:8000/books?page=1&perPage=2)

## Testing

To run tests:

```bash
php artisan test
```
