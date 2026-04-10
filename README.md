# Librp - Library Management System

A simple and effective Laravel-based web application for managing a library's books, authors, categories, and user interactions.

## Features

- Book catalog with categories and authors
- User ratings and comments
- Author profiles
- Admin panel for management
- Responsive design with Bootstrap

## Requirements

- PHP 8.1 or higher
- Composer
- Node.js and npm (for frontend assets)
- MySQL or another supported database
- XAMPP (recommended for local development)

## Installation

1. **Clone the repository:**
   ```
   git clone <repository-url>
   cd librp
   ```

2. **Install PHP dependencies:**
   ```
   composer install
   ```

3. **Install Node.js dependencies:**
   ```
   npm install
   ```

4. **Set up environment:**
   - Copy `.env.example` to `.env`
   - Configure your database settings in `.env`

5. **Generate application key:**
   ```
   php artisan key:generate
   ```

6. **Run migrations:**
   ```
   php artisan migrate
   ```

7. **Seed the database (optional):**
   ```
   php artisan db:seed
   ```

8. **Build assets:**
   ```
   npm run build
   ```

9. **Start the server:**
   ```
   php artisan serve
   ```

   Or, if using XAMPP, place the project in `htdocs` and access via `http://localhost/librp`.

## Usage

- Visit the homepage to browse books.
- Register/login to rate and comment on books.
- Admins can manage books, authors, and categories via the admin panel.

## Contributing

Feel free to submit issues or pull requests.

## License

This project is open-sourced under the MIT License.

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
