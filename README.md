# CodeIgniter POS Foundation TFA2

This CodeIgniter 4 application extends the TFA1 four-page POS foundation. Customer and user records now come from a MySQL database through CodeIgniter Models and `findAll()`, instead of static PHP arrays.

## Features

- Home page at `/`
- About page at `/about`
- Customer Accounts at `/customers`
- User Accounts at `/users`
- Shared navigation and responsive styling
- MySQL database with `customers` and `users` tables
- `CustomerModel` and `UserModel` using CodeIgniter Query Builder methods
- MVC separation between models, controllers, and views

## Requirements

- PHP 8.2 or later with the MySQLi extension
- Composer
- CodeIgniter 4.7
- MySQL or MariaDB (XAMPP is suitable)

## Installation

1. Clone or download this project and open a terminal in its directory.
2. Install dependencies: `composer install`.
3. Start MySQL through XAMPP or another local MySQL/MariaDB installation.
4. Import [`database/pos_database.sql`](database/pos_database.sql) into MySQL or phpMyAdmin. The script creates the `pos_database` database, both tables, and five sample records in each table.
5. Copy `env` to `.env` if `.env` does not exist, then configure the database:

   ```dotenv
   CI_ENVIRONMENT = development
   app.baseURL = 'http://localhost:8080/'
   database.default.hostname = localhost
   database.default.database = pos_database
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   database.default.port = 3306
   ```

   The included local `.env` assumes the common XAMPP default of user `root` with no password. Change the values if your installation differs. `.env` is ignored by Git and must not contain real credentials in a public repository.

## Database Tables

- `customers`: `id`, `full_name`, `email`, `phone`, `created_at`
- `users`: `id`, `username`, `full_name`, `created_at`

The required `users` schema has no `role` column, so the Users page displays only username and full name.

## Routes

| Page | URL |
| --- | --- |
| Home | `/` |
| About | `/about` |
| Customer Accounts | `/customers` |
| User Accounts | `/users` |

## Running the Application

From the project directory, start the CodeIgniter development server:

```bash
php spark serve
```

Open [http://localhost:8080/](http://localhost:8080/) in a browser. For a production-style local server, point the document root to `public/`.

## Database Flow

The Customers controller instantiates `CustomerModel` and passes `$model->findAll()` to the existing Customers view. The Users controller does the same with `UserModel`. The views retain their `foreach` loops and presentation structure; they do not query the database directly.

## GitHub and Security

The real `.env` file is excluded by `.gitignore`. Commit the SQL export and source files, but do not commit passwords, API keys, or other secrets. A new developer should configure their own ignored `.env` using the example above.
